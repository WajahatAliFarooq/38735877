<?php

namespace App\Http\Controllers;

use App\brand;
use App\catagory;
use App\product;
use Illuminate\Http\Request;
use mysql_xdevapi\CrudOperationBindable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = product::get();
        return view('admin.products.index' , compact('app'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = brand::get();
        $category = catagory::get();
        return view('admin.products.create', compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app = new product();
        $app->name = $request->input('name');
        $app->discription = $request->input('discription');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();
            $filename = time().".". $extension;
            $file->move('icons',$filename);
            $app->product_img = $filename;

        }
        else{
            return  $request;
            $app->icon = 'null';
        }
        $app->price = $request->input('price');
        $app->refrel = $request->input('refral');
        $app->status = $request->input('status');
        $app->brand_id = $request->input('brand');
        $app->category_id = $request->input('categories');
//        dd($app);


//        dd($app);
        $app->save();
        return redirect('product');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = product::find($id);
        return view('admin.products.show',compact('app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app  = product::find($id);
        $brand = brand::get();
        $category = catagory::get();
        return view('admin.products.edit',compact('app','brand','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $app = product::find($id);

        $app->name = $request->input('name');
        $app->discription = $request->input('discription');
        $app->price = $request->input('price');
        $app->refrel = $request->input('refral');
        $app->status = $request->input('status');
        $app->brand_id = $request->input('brand');
        $app->category_id = $request->input('categories');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();
            $filename = time().".". $extension;
            $file->move('icons',$filename);
            $app->product_img = $filename;

        }
        $app->save();
        $app = product::get();
        return redirect('product')  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = product::find($id);
        $app->delete();

        return redirect('product');
    }
    public function checkactive()
    {
        $id = request('id');
        $todos = product::find(request('id'));
        $status = $todos->status;

        if ($status == "1")
        {
            $todos->status=0;
        }
        else{
            $todos->status=1;

        }
        $todos->save();
        return json_encode(array('statusCode'=>200));
    }
}
