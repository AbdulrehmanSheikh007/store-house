@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">{{$action}} User</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <form action="{{url('users/' . Hashids::encode($data->id))}}" method="post" enctype="multipart/form-data">
        @csrf 

        <input type="hidden" name="_method" value="PUT" /><!-- comment -->
        <input type="hidden" name="id" value="{{Hashids::encode($data->id)}}" /><!-- comment -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">User Details</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control  @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="Full Name" value="{{old('full_name') ?? $data->full_name }}"> 

                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{$data->email ?? old('email')}}"> 

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Update</button>
                                    <a href="{{url('users')}}" class="btn btn-secondary float-right">Cancel</a>
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