<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\Trip;

class RefundUserController extends Controller
{

	public function __construct(refund $refund, trip $trip)
  	{  
     	$this->refund= $refund;
     	$this->trip = $trip;
  	}
    
	public function index()
	{
		$trip = $this->trip->lists();
		$data = $this->refund->refundByIdPelanggan(auth()->user()->id);
		// var_dump($data);exit();
		return view('user/refund', ['data' => $data, 'trip' => $trip]);
	}
}