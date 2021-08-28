@extends('layouts.master')
@section('title')
    Product Detail {{$app->name}} | Admin Panel
@endsection
@section('topheading')
    Product Detail {{$app->name}}
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
                    <h2 class="text-center">Product Detail</h2>
                    <strong class="pb-5">
                        <hr>
                    </strong>

                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <div id="profile-container" class="content-center">
                                    <img id="profileImage" src="{{asset('icons/'.$app->product_img)}}"  width="150px" height="150px"/>
                                </div>


                            </div>
                            <div class="col-5"></div>
                        </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="name">Name :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->name}}</p></div>
                    </div>


                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="discription">Discription :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->discription}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="brand">Brand :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{ $app->brand->brand }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="name">Price :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->price}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="refrel">Amazon Affiliate Refrel code  :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->refrel}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="Category">Category :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->category->category}}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="status">Status :</label>
                        </div>
                        <div class="col-8 "><p class="form-control">{{$app->status}}</p></div>
                    </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="/product/edit/{{$app->id}}" class="btn btn-primary btn-block form-control">Edit</a>
                            </div>

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