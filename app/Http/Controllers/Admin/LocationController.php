<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Location\LocationRepository;

class LocationController extends Controller
{
    /** @var LocationRepository */
    private $locationRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LocationRepository $locationRepository)
    {
        $this->middleware('auth');

        $this->locationRepository = $locationRepository;
    }

    /**
     * See the list of locations.
     *
     * @throws \App\Exceptions\SunnyCalConnectionException
     */
    public function index()
    {
        $response = $this->locationRepository->findAll();

        dd($response);

        //TODO create view displaying the list of locations
    }
}
