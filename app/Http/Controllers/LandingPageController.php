<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Manufacturer;
use App\Models\Category;
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
        $categories = Category::orderBy('order','asc')
        ->withCount('children')
        ->withCount('parent')
        ->get();
        // $parentCategories = DB::table('categories')
        // ->where('parent_id', '=', '')
        // ->orWhereNull('parent_id')
        // ->get();
        return view('landing-page')
        ->withCategories($categories)
        // ->withParentCategories($parentCategories)
        ->withManufacturers($manufacturers);
    }
}
