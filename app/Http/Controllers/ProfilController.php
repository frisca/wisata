<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Auth;

class ProfilController extends Controller
{

	public function __construct(users $users)
  	{  
     	$this->users= $users;
  	}

	public function index()
	{
		$id = auth()->user()->id;
		$user = $this->users->detail($id);
		return view('profil/edit', ['data' => $user]);
	}

	public function change(Request $request)
    {
 		$id = auth()->user()->id;
 		$user = $this->users->detail($id);

 		foreach ($user as $key => $value) {
 			if($request->input('password') != '') {
 				$data = array(
		            'name' => $request->input('name'),
		            'password' => bcrypt($request->input('password'))
		        );
		        $result = $this->users->change($id, $data);
        		return redirect('profil')->with('success','Data profil berhasil diubah. ');
 			}else{
 				$data = array(
		            'name' => $request->input('name')
		        );
		        $result = $this->users->change($id, $data);
        		return redirect('profil')->with('success','Data profil berhasil diubah. ');
 			}
 		}
 		return redirect('profil');
    }
}