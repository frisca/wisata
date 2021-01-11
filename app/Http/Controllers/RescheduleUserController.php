<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Reschedule;
use App\Models\Trip;

class RescheduleUserController extends Controller
{

	public function __construct(reschedule $reschedule, trip $trip)
  	{  
     	$this->reschedule= $reschedule;
     	$this->trip = $trip;
  	}
    
	public function index()
	{
		$trip = $this->trip->lists();
		$data = $this->reschedule->rescheduleByIdPelanggan(auth()->user()->id);
		// var_dump($data);exit();
		return view('user/reschedule', ['data' => $data, 'trip' => $trip]);
	}
}