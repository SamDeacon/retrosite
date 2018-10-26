<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;

class LoggedInController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
    }
    
    public function afterLoggin()
    {

        if (Gate::allows('isSuperAdmin')) {
            return redirect('/admin');
        } else {
            return redirect('/');
        }

    }
}
