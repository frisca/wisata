<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Lokasi;
use App\Models\Wisata;
use App\Models\Pemesanan;
use Carbon\Carbon;

class HomeUserController extends Controller
{
	public function __construct(trip $trip, lokasi $lokasi, wisata $wisata, pemesanan $pemesanan)
  	{  
     	$this->trip= $trip;
     	$this->lokasi = $lokasi;
		 $this->wisata = $wisata;
		 $this->pemesanan = $pemesanan;
  	}
    
	public function index()
	{

		$trip = $this->trip->trips();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->wisataByActive();
		return view('index', ['trip' => $trip, 'lokasi' => $lokasi, 'wisata' => $wisata]);
	}

	public function home()
	{
		$exist = 0;

		$trip = $this->trip->trips();
		$lokasi = $this->lokasi->lists();
		$wisata = $this->wisata->wisataByActive();
		$pemesanan = $this->pemesanan->pemesananByIdLimit(auth()->user()->id);
		// var_dump($pemesanan);exit();
		$date = Carbon::now();
		$date = $date->toDateString();
		

		if(count($pemesanan) > 0) {
			foreach($pemesanan as $v) {
				$newTime = date('d-m-Y', strtotime($v->tgl_pemesanan.' + 3 days'));
				$newDate = date('Y-m-d', strtotime($newTime));
				
				if($newDate == $date) {
					$exist = 1;
				}
			}
		}

		return view('user/home', ['trip' => $trip, 'lokasi' => $lokasi, 'wisata' => $wisata, 
		'exist' => $exist]);
	}


	public function prosesCariUser(Request $request) 
	{
		
		$trip = $this->trip->trips();
		$lokasi = $this->lokasi->lists();

		if($request->input('id_trip') != "" && $request->input('id_lokasi') != ""){
			$wisata = $this->wisata->listsWisataByLokasiAndTrip($request->input('id_trip'), $request->input('id_lokasi'));
		}else if($request->input('id_trip') == "" && $request->input('id_lokasi') == "") {
			$wisata = $this->wisata->listWisataByNoTripAndLokasi();
		}else if($request->input('id_trip') != "" && $request->input('id_lokasi') == "") {
			$wisata = $this->wisata->wisataByTrip($request->input('id_trip'));
		}
		
		return view('user/search', ['trip' => $trip, 'lokasi' => $lokasi, 'data' => $wisata]);
	}

	public function prosesCari(Request $request) 
	{
	
		$trip = $this->trip->trips();
		$lokasi = $this->lokasi->lists();

		if($request->input('id_trip') != "" && $request->input('id_lokasi') != ""){
			$wisata = $this->wisata->listsWisataByLokasiAndTrip($request->input('id_trip'), $request->input('id_lokasi'));
		}else if($request->input('id_trip') == "" && $request->input('id_lokasi') == "") {
			$wisata = $this->wisata->listWisataByNoTripAndLokasi();
		}else if($request->input('id_trip') != "" && $request->input('id_lokasi') == "") {
			$wisata = $this->wisata->wisataByTrip($request->input('id_trip'));
		}

		return view('search', ['trip' => $trip, 'lokasi' => $lokasi, 'data' => $wisata]);
	}

}