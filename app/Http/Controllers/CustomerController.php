<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Mail;
use Input;

class CustomerController extends Controller
{
    
	public function index()
	{

		 return view('customer.index');

	}

}