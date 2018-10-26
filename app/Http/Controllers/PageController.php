<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function singlePage($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('single-page')
        ->withPage($page);
    }

}
