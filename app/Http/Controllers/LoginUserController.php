<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Pelanggan;
use Auth;
use Mail;
use Input;

class LoginUserController extends Controller
{
    
	public function index()
	{

		return view('login');

	}

	public function loginUser(LoginRequest $request)
    {
        
        $credentials = $request->only('email', 'password');

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){
            
            /*
            Jika username dan password match, lakukan logika if berikut ini.
            kalau user belum mengaktifkan accountnya, maka logout, dan tampilka message untuk mengaktifkannya
            */
            if (Auth::user()->active == 0) {
                
                Auth::logout();
                return 'Please activate your account';

            }
            else{

                return redirect('/user/home'); 

            }

        }
        else{
            return 'The username and password do not match';
        }

    }

    public function logout()
    {
        
        Auth::logout();

        return redirect('/login');

    }

    public function logoutUser()
    {
        
        Auth::logout();

        return redirect('/login');

    }

}