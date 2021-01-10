<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Lokasi;
use App\Models\Wisata;

class HomeUserController extends Controller
{
	public function __construct(trip $trip, lokasi $lokasi, wisata $wisata)
  	{  
     	$this->trip= $trip;
     	$this->lokasi = $lokasi;
     	$this->wisata = $wisata;
  	}
    
	public function index()
	{
		$trip = $this->trip->lists();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->lists();
		return view('index', ['trip' => $trip, 'lokasi' => $lokasi, 'wisata' => $wisata]);
	}

}