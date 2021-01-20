<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Reschedule;
use App\Models\Pemesanan;

class RescheduleController extends Controller
{

	public function __construct(reschedule $reschedule, pemesanan $pemesanan)
  	{  
		 $this->reschedule= $reschedule;
		 $this->pemesanan = $pemesanan;
  	}
    
	public function index()
	{
		$data = $this->reschedule->rescheduleAll();
		return view('reschedule/index', ['data' => $data]);
	}

	public function detail($nomor)
	{
		$reschedule = $this->reschedule->detail($nomor);
		return view('reschedule/detail', ['data' => $reschedule]);
	}

	public function approve(Request $request, $nomor)
    {
 		$data = array(
        	'status_approve' => 1
        );

		$result = $this->reschedule->change($nomor, $data);
		
		// $datas = array(
        // 	'status_approve' => 1
        // );

		// $results = $this->pemesanan->change($nomor, $datas);
		
		$reschedule = $this->reschedule->detailById($nomor);
		foreach ($reschedule as $key => $value) {
			$datas = array(
				'status_approve' => 1
			);
	
			$result = $this->pemesanan->change($value->nomor_pemesanan, $data);
		}
        return redirect('reschedule')->with('success','Data Disetujui. ');
    }

    public function reject(Request $request, $nomor)
    {
 		$data = array(
        	'status_approve' => 2
        );

		$result = $this->reschedule->change($nomor, $data);
		
		// $datas = array(
        // 	'status_approve' => 2
        // );

		// $results = $this->pemesanan->change($nomor, $datas);

		$reschedule = $this->reschedule->detailById($nomor);
		foreach ($reschedule as $key => $value) {
			$datas = array(
				'status_approve' => 2
			);
	
			$result = $this->pemesanan->change($value->nomor_pemesanan, $data);
		}
		
        return redirect('reschedule')->with('success','Data Ditolak. ');
    }
}