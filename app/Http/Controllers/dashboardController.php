<?php

namespace App\Http\Controllers;

use App\brand;
use App\catagory;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $brand = brand::get();
        return view('admin.dashboard', compact('brand'));
//        dd($brand);
        $category = catagory::get();

        return view('admin.dashboard' , compact('brands'));

    }
}
