@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">User Profile</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <form action="{{url('profile/' . $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf 

        <input type="hidden" name="_method" value="PUT" /><!-- comment -->
        <input type="hidden" name="id" value="{{$data->id}}" /><!-- comment -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Account Details</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control  @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="First Name" value="{{ old('full_name') ?? $data->full_name}}"> 

                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') ?? $data->email}}"> 

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Update</button>

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