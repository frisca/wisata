<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Trip;

class TripController extends Controller
{

	public function __construct(Trip $trip)
  	{  
     	$this->trip= $trip;
  	}
    
	public function index()
	{
		$data = $this->trip->lists();
		return view('trip/index', ['data' => $data]);
	}

	public function add()
	{
		return view('trip/add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'trip' => 'required',
            'status_trip' => 'required'
        ]);

        $data = array(
        	'trip' => $request->input('trip'),
        	'status_trip' => $request->input('status_trip'),
            'status_delete' => 0
        );

		$result = $this->trip->store($data);
		return  redirect('trip')
                ->with('success','Data trip berhasil disimpan.');
	}

	public function edit($id)
	{
		$data = $this->trip->detail($id);
		return view('trip/edit', ['data' => $data]);
	}

	public function change(Request $request)
    {
        $this->validate($request, [
        	'id_trip' => 'required',
            'trip' => 'required',
            'status_trip' => 'required'
        ]);
 		
 		$data = array(
        	'trip' => $request->input('trip'),
        	'status_trip' => $request->input('status_trip')
        );

        $result = $this->trip->change($request->input('id_trip'), $data);
        return redirect('trip')->with('success','Data trip berhasil diubah. ');
    }

    public function detail($id)
	{
		$data = $this->trip->detail($id);
		return view('trip/detail', ['data' => $data]);
	}

	public function delete($id)
    {
 		$data = array(
        	'status_delete' => 1
        );

        $result = $this->trip->change($id, $data);
        return redirect('trip')->with('success','Data trip berhasil dihapus. ');
	}
	
	
}