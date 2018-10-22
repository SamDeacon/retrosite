<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index()
    {
        return redirect('/');
    }
}
