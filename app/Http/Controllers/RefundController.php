<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\Pemesanan;

class RefundController extends Controller
{

	public function __construct(refund $refund, pemesanan $pemesanan)
  	{  
		 $this->refund= $refund;
		 $this->pemesanan = $pemesanan;
  	}
    
	public function index()
	{
		$data = $this->refund->refundAll();
		return view('refund/index', ['data' => $data]);
	}

	public function detail($nomor)
	{
		$refund = $this->refund->detail($nomor);
		return view('refund/detail', ['data' => $refund]);
	}

	public function approve(Request $request, $nomor)
    {
 		$data = array(
        	'status_approve' => 1
        );

		$result = $this->refund->change($nomor, $data);
		
		// $datas = array(
        // 	'status_approve' => 1
        // );

		// $result = $this->pemesanan->changeById($nomor, $data);
		$refund = $this->refund->detailById($nomor);
		foreach ($refund as $key => $value) {
			$datas = array(
				'status_approve' => 1
			);
	
			$result = $this->pemesanan->change($value->nomor_pemesanan, $data);
		}
        return redirect('refund')->with('success','Data Disetujui. ');
    }

    public function reject(Request $request, $nomor)
    {
 		$data = array(
        	'status_approve' => 2
        );

		$result = $this->refund->change($nomor, $data);
		
		// $datas = array(
        // 	'status_approve' => 2
        // );

		// $results = $this->pemesanan->change($nomor, $datas);
		$refund = $this->refund->detailById($nomor);
		foreach ($refund as $key => $value) {
			$datas = array(
				'status_approve' => 2
			);
	
			$result = $this->pemesanan->change($value->nomor_pemesanan, $data);
		}
        return redirect('refund')->with('success','Data Ditolak. ');
    }
}