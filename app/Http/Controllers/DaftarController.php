<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use App\Models\Users;
use Auth;
use Mail;
use Input;

class DaftarController extends Controller
{
    public function __construct(Users $users)
    {  
        $this->users= $users;
    }

	public function index()
	{
		return view('register');
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $data = array(
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'activation_code' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'active' => 1
        );

        $result = $this->users->store($data);
        return  redirect('daftar')
                ->with('success','Data pelanggan berhasil disimpan.');
    }

}