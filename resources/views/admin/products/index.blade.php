@extends('layouts.master')
@section('title')
    Product | Admin Panel
@endsection
@section('topheading')
   Product
@endsection
@section('content')


    {{--End Of First Row--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title"> Product Table</h4>
                        </div>
                        <div class="col-6">
                            <a href="/product/create" class="btn btn-primary btn-block form-control">Add New Product <i class="now-ui-icons ui-1_simple-add  float-right font-weight-bold"></i></a>
                        </div>
                    </div>
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
                                Name
                            </th>
                            <th class="text-center">
                                Brand
                            </th>
                            <th class="text-center">
                                Category
                            </th>
                            <th class="text-center">
                                Price
                            </th>
                            <th class="text-center">
                                Status
                            </th>
                            <th class="text-center">
                                Actions
                            </th>
                            </thead>
                            <tbody id="myTable">
                            <p hidden>{{$a=1}}</p>
                            @foreach($app as $product)

                            @if($product->status == 0)
                            <tr style="background-color: #ff270066;">
                                <td class="text-center">
                                    {{$a++}}
                                </td>
                                <td class="text-center">
                                    {{$product->name}}
                                </td>
                                <td class="text-center">
                                    {{$product->brand->brand}}
                                </td>
                                <td class="text-center">
                                    {{$product->category->category}}
                                </td>
                                <td class="text-center">
                                    {{$product->price}}
                                </td>
                                <td class="text-center">
                                    @if($product->status == 1)
                                        <a class="btn btn-danger btn-block form-control" onclick="active({{$product->id}})">Active</a>
                                        @else
                                        <a class="btn btn-success btn-block form-control" onclick="active({{$product->id}})">In Active</a>
                                        @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <a class="btn btn-secondary btn-block form-control" href="/productview/{{$product->id}}">view</a>
                                        </div>
                                        <div class="col-4">
                                            <a class="btn btn-primary btn-block form-control" href="/product/edit/{{$product->id}}">Edit</a>
                                        </div>
                                        <div class="col-4">
                                            <a class="btn btn-danger btn-block form-control" href="/productdelete/{{$product->id}}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                @else
                                <tr>
                                    <td class="text-center">
                                        {{$a++}}
                                    </td>
                                    <td class="text-center">
                                        {{$product->name}}
                                    </td>
                                    <td class="text-center">
                                        {{$product->brand->brand}}
                                    </td>
                                    <td class="text-center">
                                        {{$product->category->category}}
                                    </td>
                                    <td class="text-center">
                                        {{$product->price}}
                                    </td>
                                    <td class="text-center">
                                        @if($product->status == 1)
                                            <a class="btn btn-danger btn-block form-control" onclick="active({{$product->id}})">Active</a>
                                        @else
                                            <a class="btn btn-success btn-block form-control" onclick="active({{$product->id}})">In Active</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4">
                                                <a class="btn btn-secondary btn-block form-control" href="/productview/{{$product->id}}">view</a>
                                            </div>
                                            <div class="col-4">
                                                <a class="btn btn-primary btn-block form-control" href="/product/edit/{{$product->id}}">Edit</a>
                                            </div>
                                            <div class="col-4">
                                                <a class="btn btn-danger btn-block form-control" href="/productdelete/{{$product->id}}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--End Of Second Row--}}

@endsection



@section('scripts')
    $(document).ready(function() {
    var element = document.getElementById('productbtn');
    element.className += 'active';


    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

    });

    function active(id){
    var url = 'activeinactive';
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    })
    $.ajax({
    url: url,
    method: 'PATCH',
    data:{
    id:id,
    },
    success: function(dataResult){
    dataResult = JSON.parse(dataResult);
    if(dataResult.statusCode)
    {
    window.location = "/product";
    }
    else{
    alert("Internal Server Error");
    }

    }
    })


    }


@endsection








{{----}}