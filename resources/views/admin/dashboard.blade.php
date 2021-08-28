@extends('layouts.master')
@section('title')
    Dashboard | Admin Panel
    @endsection
@section('topheading')
    Dashboard
    @endsection
@section('content')


    <div class="row">

{{--    Brand Table Start Here--}}
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Brand Table</h4>
                            <form>
                                <div class="input-group no-border">
                                    <input type="text" id="myInput1" class="form-control" placeholder="Search...">
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
                                    <th>
                                        Serial Number
                                    </th>
                                    <th>
                                        Brand Name
                                    </th>
                                    </thead>
                                    <tbody id="myTable1">
                                    <p hidden> {{$a = 1}}</p>
                                     @foreach($brand as $brands )
                                    <tr>
                                        <td>
                                            {{$a++}}
                                        </td>
                                        <td>
                                            {{$brands->brand}}
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Catagory Table </h4>
                            <form>
                                <div class="input-group no-border">
                                    <input type="text" id="myInput2" class="form-control" placeholder="Search...">
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
                                    <th>
                                        Serial Number
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                    </thead>
                                    <tbody id="myTable2">

                                    <p hidden> {{$b=1}}</p>
                                    @foreach($catagory as $category)
                                    <tr>
                                        <td>
                                            {{$b++}}
                                        </td>
                                        <td>
                                            {{$category->category}}
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

{{--Category table End Here--}}

    </div>
{{--End Of First Row--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Product Table</h4>
                    <form>
                        <div class="input-group no-border">
                            <input type="text" id="myInput3" class="form-control" placeholder="Search...">
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

                            </thead>
                            <tbody id="myTable3">
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
                                                Active
                                            @else
                                                In Active
                                            @endif
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
                                                Active
                                            @else
                                                In Active
                                            @endif
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
    var element = document.getElementById('homebtn');
    element.className += 'active';

    $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

    $("#myInput2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

    $("#myInput3").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable3 tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });





    });
@endsection








{{----}}