<?php

namespace App\Http\Controllers;

use App\catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = catagory::get();
        return view('admin.catagory.index' ,compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = catagory::create([
            'category' => $request->input('category_name'),
            ]);

        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(catagory $catagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $id = request('id');
        $category = catagory::find(request('id'));
        $category->category = request('data');
        $category->save();
        return json_encode(array('statusCode'=>200));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(catagory $catagory)
    {
        $data = catagory::find($catagory);
        $catagory->delete();
        return redirect()->back();
    }
}
