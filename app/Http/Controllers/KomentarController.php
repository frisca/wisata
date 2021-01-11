<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Trip;

class KomentarController extends Controller
{

	public function __construct(Komentar $komentar, Trip $trip)
  	{  
     	$this->komentar= $komentar;
        $this->trip = $trip;
  	}
    
	public function index()
	{
        $trip = $this->trip->lists();
        $data = $this->komentar->lists();
		return view('testimoni', ['trip' => $trip, 'data' => $data]);
	}

    public function testimoni()
    {
        $trip = $this->trip->lists();
        $data = $this->komentar->lists();
        return view('user/testimoni', ['trip' => $trip, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $trip = $this->trip->lists();
        $data = array(
            'isi' => $request->input('isi'),
            'nama_komentar' => auth()->user()->name,
            'tgl_komentar' => date('Y-m-d')
        ); 

        $res = $this->komentar->store($data);
        return redirect('user/testimoni');
    }
}