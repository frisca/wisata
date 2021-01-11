<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\TiketPemesanan;
use App\Models\TanggalWisata;
use App\Models\Wisata;
use App\Models\Trip;
use Input;

class KonfirmasiController extends Controller
{

	public function __construct(pemesanan $pemesanan, pemesanandetail $pemesanandetail, tiketpemesanan $tiketpemesanan, tanggalwisata $tanggalwisata, wisata $wisata, trip $trip)
  	{  
     	$this->pemesanan= $pemesanan;
      $this->pemesanandetail = $pemesanandetail;
      $this->tiketpemesanan = $tiketpemesanan;
      $this->tanggalwisata = $tanggalwisata;
      $this->wisata = $wisata;
      $this->trip = $trip;
  	}
    
	public function index()
	{
		$data = $this->pemesanan->pemesananById(auth()->user()->id);
    $trip = $this->trip->lists();
		return view('konfirmasi/index', ['data' => $data, 'trip' => $trip]);
	}
}
