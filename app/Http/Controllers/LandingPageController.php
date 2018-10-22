<?php

namespace App\Http\Controllers;
use App\Manufacturer;
use Gate;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $manufacturers = Manufacturer::orderBy('created_at','desc')->get();
        return view('landing-page')
        ->withManufacturers($manufacturers);
    }
}
