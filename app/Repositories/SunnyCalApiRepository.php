<?php


namespace App\Repositories;


use App\Exceptions\SunnyCalConnectionException;
use App\Infrastructure\Repositories\ManagesCache;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;

class SunnyCalApiRepository
{
    use ManagesCache;

    const SUNNYCAL_TOKEN = 'nc:access-token';

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
     * @param string $method
     * @param string $uri
     * @param array|null $data
     *
     * @return stdClass|array
     * @throws SunnyCalConnectionException
     * @throws GuzzleException
     */
    public function sendRequest(string $method, string $uri, array $data = [])
    {
        /** @var string $token */
        if (! $token = $this->read(self::SUNNYCAL_TOKEN)) {
            $token = $this->login();
        }

        /** @var array $options */
        $options = [
            'base_uri' => config('sunnycal.api.url'),
            'query'    => [
                'auth_token' => $token,
            ],
            'json' => $data,
        ];

        try {
            $response = $this->client->request($method, $uri, $options);
        } catch (Exception $apiConnectException) {
            if ($apiConnectException->getCode() === Response::HTTP_UNAUTHORIZED || Str::contains($apiConnectException->getMessage(), [self::NC_INVALID_TOKEN_MESSAGE])) {
                $this->login();

                return $this->sendRequest($method, $uri, $data);
            }

            throw new NoahConnectApiConnectionException($apiConnectException->getMessage());
        }

        return json_decode((string) $response->getBody()->getContents());
    }

    /**
     * Authenticate user and returns access token.
     *
     * @param array $credentials
     *
     * @return string
     * @throws SunnyCalConnectionException
     * @throws GuzzleException
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

        $options['json'] = $data;

        try {
            $response = $this->client->request('POST', 'v1/login', $data);
            if ($response->getStatusCode() === Response::HTTP_NOT_FOUND) {
                throw new SunnyCalConnectionException(json_decode($response->getBody()->getContents())->message);
            }
        } catch (Exception $sunnyCalException) {
            throw new SunnyCalConnectionException(json_decode($sunnyCalException->getMessage())->message);
        } catch (GuzzleException $guzzleException){

            throw new SunnyCalConnectionException('Wrong email or password');
        }



        /** @var string $token */
        //dd($response->getBody()->getContents());
        $response = json_decode($response->getBody()->getContents())->data;
        $token = $response->token;


        if (! isset($credentials['remember']) || ! $credentials['remember']) {
            $this->forget(self::SUNNYCAL_TOKEN);
            $this->remember(self::SUNNYCAL_TOKEN, $token);
        }

       // dd(json_decode($response->getBody()->getContents()));

        return $response;
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
