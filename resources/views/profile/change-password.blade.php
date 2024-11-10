@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Change Password</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <form action="{{url('update-password')}}" method="post" enctype="multipart/form-data">
        @csrf 

        <input type="hidden" name="_method" value="POST" /><!-- comment -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Change Password</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" 
                                                   class="form-control  @error('current_password') is-invalid @enderror" 
                                                   id="current_password" 
                                                   name="current_password" placeholder="Current Password" 
                                                   > 

                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password">New Password</label>
                                            <input type="password" 
                                                   class="form-control  @error('password') is-invalid @enderror" 
                                                   id="password" 
                                                   name="password" placeholder="New Password"> 

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" 
                                                   class="form-control  @error('password_confirmation') is-invalid @enderror " 
                                                   id="password_confirmation" 
                                                   name="password_confirmation" placeholder="Confirm Password"> 

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            
                                        </div>
                                        <div class="form-group col-md-6">

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-accent">Update Account</button>

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