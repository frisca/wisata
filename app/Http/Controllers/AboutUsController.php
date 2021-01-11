<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Trip;
use App\Models\Lokasi;
use App\Models\Fasilitas;
use App\Models\TanggalWisata;
use App\Models\Syarat;

class AboutUsController extends Controller
{

	public function __construct(Wisata $wisata, Lokasi $lokasi, Trip $trip, Fasilitas $fasilitas, TanggalWisata $tanggalwisata, Syarat $syarat)
  	{  
     	$this->wisata= $wisata;
      $this->lokasi = $lokasi;
      $this->trip = $trip;
      $this->fasilitas = $fasilitas;
      $this->tanggalwisata = $tanggalwisata;
      $this->syarat = $syarat;
  	}
    
	public function index()
	{
    $trip = $this->trip->lists();
		return view('about_us', ['trip' => $trip]);
	}

  public function about()
  {
    $trip = $this->trip->lists();
    return view('user/about_us', ['trip' => $trip]);
  }
}