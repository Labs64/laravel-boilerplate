<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use App\Repositories\Location\LocationRepository;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class LocationController extends Controller
{
    /** @var LocationRepository $locationRepository */
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
     * See the list of locations
     * @throws \App\Exceptions\SunnyCalConnectionException
     */
    public function index()
    {

        $response = $this->locationRepository->findAll();

        dd($response);

        //TODO create view displaying the list of locations



    }


}
