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

class WisataUserController extends Controller
{

	public function __construct(Wisata $wisata, Lokasi $lokasi, Trip $trip, Fasilitas $fasilitas, TanggalWisata $tanggalwisata)
  	{  
     	$this->wisata= $wisata;
        $this->lokasi = $lokasi;
        $this->trip = $trip;
        $this->fasilitas = $fasilitas;
        $this->tanggalwisata = $tanggalwisata;
  	}
    
	public function index($id)
	{
		    $data = $this->wisata->detail($id);
        $trip = $this->trip->lists();
        $tanggalwisata = $this->tanggalwisata->tanggalWisata($id);
        // var_dump($tanggalwisata);exit();
		return view('wisata', ['data' => $data, 'trip' => $trip, 'tanggalwisata' => $tanggalwisata]);
	}

  public function wisata($id)
  {
        $data = $this->wisata->detail($id);
        $trip = $this->trip->lists();
        $tanggalwisata = $this->tanggalwisata->tanggalWisata($id);
        // var_dump($tanggalwisata);exit();
    return view('user/wisata', ['data' => $data, 'trip' => $trip, 'tanggalwisata' => $tanggalwisata]);
  }
}