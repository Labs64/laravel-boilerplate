<?php

namespace App\Repositories\User;

use App\Exceptions\SunnyCalConnectionException;
use App\Exceptions\UnauthorizedUserException;
use App\Repositories\SunnyCalApiRepository;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Auth\AuthManager;

class UserRepository
{
    /**
     * @var AuthManager
     */
    private $authManager;

    /**
     * @var SunnyCalApiRepository
     */
    private $sunnyCalApiRepository;

    public function __construct(
        AuthManager $authManager,
        SunnyCalApiRepository $sunnyCalApiRepository)
    {
        $this->authManager           = $authManager;
        $this->sunnyCalApiRepository = $sunnyCalApiRepository;
    }

    /**
     * @param array $credentials
     * @param bool  $rememberMe
     *
     * @throws GuzzleException
     * @throws UnauthorizedUserException
     *
     * @return string
     */
    public function userLogin(array $credentials, bool $rememberMe = false)
    {
        try {
            /** @var array $remoteCredentials */
            $remoteCredentials = array_merge($credentials, ['remember' => false]);

            return $this->sunnyCalApiRepository->login($remoteCredentials);
        } catch (GuzzleException $guzzleException) {
            throw new UnauthorizedUserException($guzzleException->getMessage());
        } catch (SunnyCalConnectionException $sunnyCalConnectionException) {
            throw new UnauthorizedUserException($sunnyCalConnectionException->getMessage());
        }
    }
}
