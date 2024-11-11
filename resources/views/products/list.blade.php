@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Manage Products</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom pr-0">
                    <div class="row col-md-12 pr-0">
                        <div class="col-md-10 btn-group mb-3 pl-0" >
                            <form action="" method="GET" class="row col-md-10">
                                <input type="text" name="search" class="form-control col-md-4" placeholder="Search by name" value="@if(!empty($_REQUEST['search'])){{$_REQUEST['search']}}@endif" />

                                <button type="submit" class="btn btn-primary px-8 ml-2">
                                    <i class="material-icons">filter_alt</i>
                                    Apply Filter</button>
                                <a href="{{url('products')}}" class="btn btn-secondary ml-2">
                                    <i class="material-icons">filter_alt_off</i>
                                    Reset</a>
                            </form>
                        </div>
                        <div class="col-md-2 pr-0" >
                            <a href="{{url('products/create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>

                </div>

                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 table-hover table-condensed">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="text-left border-0" style="width: 10% !important;">Product</th>
                                <th scope="col" class="text-left border-0">Name</th>
                                <th scope="col" class="text-center border-0">Qty.</th>
                                <th scope="col" class="text-center border-0">Price</th>
                                <th scope="col" class="text-left border-0">Created By</th>
                                <th scope="col" class="text-left border-0">Updated At</th>
                                <th scope="col" class="border-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td class="text-left"><img src="{{checkImage($item->image)}}"  class="img img-responsive img-thumbnail" /></td>
                                <td class="text-left">{{ucfirst($item->name)}}</td>
                                <td class="text-center">{{ucfirst($item->quantity)}}</td>
                                <td class="text-center">{{number_format($item->price, 2)}}</td>
                                <td class="text-left">{{ucfirst($item->creator->full_name)}}</td>
                                <td class="text-left">{{\Carbon\Carbon::parse($item->updated_at)->format("M d, Y H:i A")}}</td>
                                <td>
                                    <a href="{{url('products/' . Hashids::encode($item->id) . '/edit')}}" class="btn btn-warning"><i class="fa fa-edit white"></i></a>

                                    <form method="POST" action="{{url('/products/' .Hashids::encode($item->id))}}" accept-charset="UTF-8" style="display:inline">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="{{csrf_token()}}">
                                        <button class="btn btn-danger delete-form-btn"  data-toggle="tooltip" title="Delete"  type="button"><i class="fa fa-trash fa-fw" title="Delete"></i></button>
                                        <input class="d-none deleteSubmit" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center float-right">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>
@endsection