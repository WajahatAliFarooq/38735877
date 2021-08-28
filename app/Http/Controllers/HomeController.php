<?php

namespace App\Http\Controllers;

use App\brand;
use App\catagory;
use App\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = brand::get();
        $catagory = catagory::get();
        $app = product::get();
        return view('admin.dashboard', compact('brand' , 'catagory' , 'app'));
    }
}
