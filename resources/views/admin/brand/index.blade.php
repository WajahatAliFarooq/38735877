@extends('layouts.master')
@section('title')
    Brand | Admin Panel
@endsection
@section('topheading')
    Brand
@endsection
@section('content')



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{route('brand')}}" method="POST">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input type="text" name="brand_name" placeholder="Enter Brand Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">

                                            <button type="submit" class="btn-primary btn-block form-control">Add Brand  <i class="now-ui-icons ui-1_simple-add float-right font-weight-bold"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                                <strong>
                                    <hr>
                                </strong>
                                  <h4 class="card-title"> Brand Table</h4>


                                <div class="input-group no-border">
                                    <input type="text" value="" id="myInput" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th class="text-center">
                                        Serial Number
                                    </th>
                                    <th class="text-center">
                                        Brand Name
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                    </thead>
                                    <tbody id="myTable">
            <p hidden> {{$a = 1}}</p>
                                    @foreach($brand as $brands )
                                    <tr class="text-center">
                                        <td>
                                            {{$a++}}
                                        </td>
                                        <td class="text-center">
                                            {{$brands->brand}}
                                        </td>
                                        <td >
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn btn-primary btn-block form-control" data-toggle="modal" data-target="#myModal{{$brands->id}}">
                                                        Edit
                                                    </button>
                                                    <div class="modal fade" id="myModal{{$brands->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" >Edit Brand Name</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="text" class="form-control" id="updatedbrand{{$brands->id}}" value="{{$brands->brand}}">
                                                                </div>
                                                                <div >
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <button type="button" class="btn btn-secondary btn-block form-control" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <button type="button" class="btn btn-success btn-block form-control" onclick="updatebrand({{$brands->id}})">Save changes</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <form  action="brand/{{$brands->id}}" method="post">
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
        </div>
        {{--        Brand Table End Here--}}
        {{--   Catogery Table   --}}


            <!-- Modal HTML embedded directly into document -->

@endsection


@section('scripts')
    $(document).ready(function() {
    var element = document.getElementById('brandbtn');
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
    function updatebrand(id){
    var data=document.getElementById("updatedbrand"+id).value;
    var url = 'brand'

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
    window.location = "/brand";
    }
    else{
    alert("Internal Server Error");
    }

    }
    })

    }



@endsection








{{----}}