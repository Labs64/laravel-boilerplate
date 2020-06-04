<?php

namespace App\Repositories\Location;

use App\Exceptions\SunnyCalConnectionException;
use App\Repositories\SunnyCalApiRepository;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Session;

class LocationRepository
{
    /**
     * @var SunnyCalApiRepository
     */
    private $sunnyCalApiRepository;

    public function __construct(SunnyCalApiRepository $sunnyCalApiRepository)
    {
        $this->sunnyCalApiRepository = $sunnyCalApiRepository;
    }

    public function findAll()
    {
        try {
            $organization_id = Session::get('user')->organization;

            return $this->sunnyCalApiRepository->sendRequest('GET', '/api/v1/organizations/'.$organization_id.'/locations');
        } catch (Exception $sunnyCalException) {
            throw new SunnyCalConnectionException(json_decode($sunnyCalException->getMessage())->message);
        } catch (GuzzleException $guzzleException) {
            throw new SunnyCalConnectionException('Wrong email or password');
        }
    }
}
