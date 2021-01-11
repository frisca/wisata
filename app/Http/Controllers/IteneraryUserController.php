<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Itenerary;
use App\Models\Wisata;
use App\Models\Trip;

class IteneraryUserController extends Controller
{

	public function __construct(Itenerary $itenerary, Wisata $wisata, Trip $trip)
  	{  
     	$this->itenerary= $itenerary;
        $this->wisata = $wisata;
        $this->trip = $trip;
  	}
    
	public function index($id)
	{
		$wisata = $this->wisata->detail($id);
        $trip = $this->trip->lists();
		$data = $this->itenerary->iteneraryByWisata($id);
		return view('itenerary', ['data' => $data, 'trip' => $trip, 'wisata' => $wisata]);
	}

	public function itenerary($id)
	{
		$wisata = $this->wisata->detail($id);
        $trip = $this->trip->lists();
		$data = $this->itenerary->iteneraryByWisata($id);
		return view('user/itenerary', ['data' => $data, 'trip' => $trip, 'wisata' => $wisata]);
	}
}