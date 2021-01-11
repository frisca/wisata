<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Wisata;

class TripUserController extends Controller
{

	public function __construct(Trip $trip, Wisata $wisata)
  	{  
     	$this->trip= $trip;
        $this->wisata = $wisata;
  	}
    
	public function index($id)
	{
        $trip = $this->trip->lists();
		$data = $this->wisata->wisataByTrip($id);
		return view('trip', ['data' => $data, 'trip' => $trip]);
	}

	public function trip($id)
	{
        $trip = $this->trip->lists();
		$data = $this->wisata->wisataByTrip($id);
		return view('user/trip', ['data' => $data, 'trip' => $trip]);
	}
}