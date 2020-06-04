<?php

namespace App\Repositories;

use App\Exceptions\SunnyCalConnectionException;
use App\Infrastructure\Repositories\ManagesCache;
use App\Models\Auth\User\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class SunnyCalApiRepository
{
    use ManagesCache;

    const SUNNYCAL_TOKEN        = 'access-token';
    const SUNNYCAL_ORGANIZATION = 'ORGANIZATION';

    /**
     * @var Client
     */
    private $client;

    /**
     * RemoteRepository constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Resolved HTTP API requests.
     *
     * @param string     $method
     * @param string     $uri
     * @param array|null $data
     *
     * @throws SunnyCalConnectionException
     * @throws GuzzleException
     *
     * @return stdClass|array
     */
    public function sendRequest(string $method, string $uri, array $data = [])
    {
        $token = Session::get('user')->access_token;

        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Accept'        => 'application/json',
        ];

        /** @var array $headers */
        $options = [
            'base_uri' => config('sunnycal.api.url'),
            'json'     => $data,
            'headers'  => $headers,
        ];

        try {
            $response = $this->client->request($method, $uri, $options);

            return json_decode((string) $response->getBody()->getContents());
        } catch (GuzzleException $guzzleException) {
            throw new SunnyCalConnectionException($guzzleException->getMessage());
        }
    }

    /**
     * Authenticate user and returns access token.
     *
     * @param array $credentials
     *
     * @throws SunnyCalConnectionException
     * @throws GuzzleException
     *
     * @return string
     */
    public function login(array $credentials = [])
    {
        $data = [
            'base_uri'    => config('sunnycal.api.url'),
            'form_params' => [
                'email'    => $credentials['email'],
                'password' => $credentials['password'],
            ],
        ];

        try {
            $response = $this->client->request('POST', 'v1/login', $data);

            if ($response->getStatusCode() === Response::HTTP_NOT_FOUND) {
                throw new SunnyCalConnectionException(json_decode($response->getBody()->getContents())->message);
            }
        } catch (Exception $sunnyCalException) {
            throw new SunnyCalConnectionException(json_decode($sunnyCalException->getMessage())->message);
        } catch (GuzzleException $guzzleException) {
            throw new SunnyCalConnectionException('Wrong email or password');
        }

        /** @var string $token */
        $response = json_decode($response->getBody()->getContents())->data;
        $token    = $response->token;

        //$this->forget(self::SUNNYCAL_TOKEN);
        ////$this->remember(self::SUNNYCAL_TOKEN, $token);
        // dd(self::SUNNYCAL_TOKEN);

        $this->storeAuthUser($token);

        // dd(json_decode($response->getBody()->getContents()));

        return $response;
    }

    /**
     * Retrieves the data of the authenticated user and stores it on the session.
     *
     * @param $token
     *
     * @throws SunnyCalConnectionException
     */
    public function storeAuthUser($token)
    {
        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Accept'        => 'application/json',
        ];

        /** @var array $headers */
        $options = [
            'base_uri' => config('sunnycal.api.url'),
            'headers'  => $headers,
        ];

        try {
            $response = $this->client->request('GET', 'v1/me', $options);

            $data = json_decode($response->getBody()->getContents())->data;

            $user               = new User();
            $user->email        = $data->email;
            $user->access_token = $token;
            $user->name         = $data->name;
            $user->organization = $data->organization->uuid;

            Session::put('authenticated', true);
            Session::put('user', $user);
        } catch (GuzzleException $guzzleException) {
            throw new SunnyCalConnectionException('Unable to retrieve authenticated user');
        }
    }

    /**
     * Forgets user auth remote token.
     *
     * return void
     */
    public function logout()
    {
        $this->forget(self::SUNNYCAL_TOKEN);
    }
}
