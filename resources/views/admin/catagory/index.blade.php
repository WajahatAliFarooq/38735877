@extends('layouts.master')
@section('title')
   Category | Admin Panel
@endsection
@section('topheading')
    Category
@endsection
@section('content')



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{Route('category')}}" method="POST">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input type="text" name="category_name" placeholder="Enter Category" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">

                                            <button type="submit" class="btn-primary btn-block form-control">Add Category  <i class="now-ui-icons ui-1_simple-add float-right font-weight-bold"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                            <strong>
                                <hr>
                            </strong>
                            <h4 class="card-title"> Catagory Table </h4>
                            <form>
                                <div class="input-group no-border">
                                    <input type="text" value="" id="myInput" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th class="text-center">
                                        Serial Number
                                    </th>
                                    <th class="text-center">
                                        Category Name
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                    </thead>
                                    <tbody id="myTable">

                                    <p hidden> {{$a = 1}}</p>

                                    @foreach($category as $categories)
                                    <tr>
                                        <td class="text-center">
                                            {{$a++}}
                                        </td>
                                        <td class="text-center">
                                            {{$categories->category}}
                                        </td>
                                        <td >
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn btn-primary btn-block form-control" data-toggle="modal" data-target="#myModal{{$categories->id}}">
                                                        Edit
                                                    </button>
                                                    <div class="modal fade" id="myModal{{$categories->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" >Edit Brand Name</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" class="form-control" id="updatedbrand{{$categories->id}}" value="{{$categories->category}}">
                                                                </div>
                                                                <div >
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <button type="button" class="btn btn-secondary btn-block form-control" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <button type="button" class="btn btn-success btn-block form-control" onclick="updatecategory({{$categories->id}})">Save changes</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">

                                                    <form  action="category/{{$categories->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-block form-control">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection


@section('scripts')

    $(document).ready(function() {
    var element = document.getElementById('categorybtn');
    element.className += 'active';

    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

    $("#myBtn").click(function(){

    // show Modal
    $('#myModal').modal('show');
    });



    });







    function updatecategory(id){
    var data=document.getElementById("updatedbrand"+id).value;
    var url = 'category';

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })

    $.ajax({
    url: url,
    method: 'PATCH',
    data:{

    id:id,data:data,
    },
    success: function(dataResult){
    dataResult = JSON.parse(dataResult);
    if(dataResult.statusCode)
    {
    window.location = "/category";
    }
    else{
    alert("Internal Server Error");
    }

    }
    })
    }

@endsection








{{----}}