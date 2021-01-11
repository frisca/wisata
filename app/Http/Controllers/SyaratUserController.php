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

class SyaratUserController extends Controller
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
    
	public function index($id)
	{
	  $wisata = $this->wisata->detail($id);
    $trip = $this->trip->lists();
    $data = $this->syarat->syaratByWisata($id);
		return view('syarat', ['data' => $data, 'trip' => $trip, 'wisata' => $wisata]);
	}

  public function syarat($id)
  {
    $wisata = $this->wisata->detail($id);
    $trip = $this->trip->lists();
    $data = $this->syarat->syaratByWisata($id);
    return view('user/syarat', ['data' => $data, 'trip' => $trip, 'wisata' => $wisata]);
  }
}