<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Reschedule;

class RescheduleController extends Controller
{

	public function __construct(reschedule $reschedule)
  	{  
     	$this->reschedule= $reschedule;
  	}
    
	public function index()
	{
		$data = $this->reschedule->lists();
		return view('reschedule/index', ['data' => $data]);
	}

	public function detail($nomor)
	{
		$reschedule = $this->reschedule->detail($nomor);
		return view('reschedule/detail', ['data' => $reschedule]);
	}
}