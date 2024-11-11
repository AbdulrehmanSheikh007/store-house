@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Categories Management</span>
            <h3 class="page-title">{{$action}} Category</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <form action="{{url('categories')}}" method="post" enctype="multipart/form-data">
        @csrf 

        <input type="hidden" name="_method" value="POST" /><!-- comment -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Category Details</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col  col-md-6">
                                    <div class="form-row">
                                        <div class="form-group  col-md-12">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Category Name" value="{{$data->name ?? old('name')}}"> 

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="{{url('categories')}}" class="btn btn-secondary float-right">Cancel</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!-- End Default Light Table -->
</div>
@endsection