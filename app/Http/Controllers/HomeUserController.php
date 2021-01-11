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

	public function home()
	{
		$trip = $this->trip->lists();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->lists();
		return view('user/home', ['trip' => $trip, 'lokasi' => $lokasi, 'wisata' => $wisata]);
	}


	public function prosesCari(Request $request) 
	{
		// var_dump($request->input('id_lokasi'));exit();
		$trip = $this->trip->lists();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->listsWisataByLokasiAndTrip($request->input('id_trip'), $request->input('id_lokasi'));
		// var_dump($request->input('id_trip'));exit();
		return view('user/search', ['trip' => $trip, 'lokasi' => $lokasi, 'data' => $wisata]);
	}

	public function prosesCariUser(Request $request) 
	{
		// var_dump($request->input('id_lokasi'));exit();
		$trip = $this->trip->lists();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->listsWisataByLokasiAndTrip($request->input('id_trip'), $request->input('id_lokasi'));
		// var_dump($request->input('id_trip'));exit();
		return view('search', ['trip' => $trip, 'lokasi' => $lokasi, 'data' => $wisata]);
	}

}