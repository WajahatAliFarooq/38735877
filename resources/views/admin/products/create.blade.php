@extends('layouts.master')
@section('title')
    Add Product | Admin Panel
@endsection
@section('topheading')
    Add Product
@endsection
@section('content')


    <style>
        #imageUpload
        {
            display: none;
        }

        #profileImage
        {
            cursor: pointer;
        }

        #profile-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
        }

        #profile-container img {
            width: 150px;
            height: 150px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Add Product</h2>
                    <strong class="pb-5">
                        <hr>
                    </strong>
                    <form action="/product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <div id="profile-container" class="content-center">
                                    <img id="profileImage" src="https://cdn.pixabay.com/photo/2017/07/11/13/56/user-2493635_960_720.png" />
                                </div>
                                <input  type="file" name="image" id="imageUpload" required  >

                            </div>
                            <div class="col-5"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name..." required>
                        </div>
                        <div class="form-group">
                            <label for="Brand">Brand</label>
                            <select name="brand" id="brand" class="form-control" required>
                                <option value="">Select Brand</option>
                                @foreach($brand as $brands)
                                    <option value="{{$brands->id}}">{{$brands->brand}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="discription">Discription</label>
                            <input type="textarea" name="discription"  id="discription" class="form-control" placeholder="Enter Product Discription..." required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price"  id="price" class="form-control" placeholder="Enter Product Price..." required>
                        </div>
                        <div class="form-group">
                            <label for="refral">Amazon Affiliate Refrel code </label>
                            <input type="string" name="refral"  id="refral" class="form-control" placeholder="Enter Refrel code" required>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories" id="categories" class="form-control" required>
                                <option value="">Select Categories</option>
                                @foreach($category as $categories)
                                <option value="{{$categories->id}}">{{$categories->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>

                                <option value="0">In Active</option>
                                <option value="1">Active</option>

                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block form-control">Submit</button>


                    </div>
                    </form>
                            <div class="col-6">
                                <a href="/product" class="btn btn-primary btn-block form-control">Cencel</a>

                            </div>
                        </div>





                </div>
                <div class="card-body">
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--        Brand Table End Here--}}
    {{--   Catogery Table   --}}


    <!-- Modal HTML embedded directly into document -->

@endsection


@section('scripts')
    $("#profileImage").click(function(e) {
    $("#imageUpload").click();
    });

    function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
    $('#profileImage').attr('src',
    window.URL.createObjectURL(uploader.files[0]) );
    }
    }

    $("#imageUpload").change(function(){
    fasterPreview( this );
    });


@endsection








{{----}}