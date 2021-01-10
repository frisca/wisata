<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Refund;

class RefundController extends Controller
{

	public function __construct(refund $refund)
  	{  
     	$this->refund= $refund;
  	}
    
	public function index()
	{
		$data = $this->refund->lists();
		return view('refund/index', ['data' => $data]);
	}

	public function detail($nomor)
	{
		$reschedule = $this->refund->detail($nomor);
		return view('refund/detail', ['data' => $refund]);
	}
}