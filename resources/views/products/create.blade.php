@extends('layouts.app')
@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Products Management</span>
            <h3 class="page-title">{{$action}} Product</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <form action="{{url('products')}}" method="post" enctype="multipart/form-data">
        @csrf 

        <input type="hidden" name="_method" value="POST" /><!-- comment -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                    <div class="card-header border-bottom text-center">
                        <div class="mb-3 mx-auto">
                            <img class="rounded-rounded image-display img-responsive" src="{{checkImage('/', false)}}"  style="width: 100%;" /> 
                        </div>
                        <span class="text-muted d-block mb-2"></span>
                        <button type="button" onclick="chooseFile(this);" class="mb-2 btn btn-lg btn-pill btn-outline-primary mr-2">
                            <i class="fa fa-image mr-1"></i> Upload Image
                            <input type="file" class="d-none file-upload-btn" is_photo="true" id="image" name="image" />
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Product Details</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Product Name" value="{{old('name')}}">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="categories">Categories</label>
                                            <select id="categories" name="categories[]" class="form-control select2Lib @error('categories') is-invalid @enderror" 
                                                    multiple="multiple">
                                                @foreach($categories as $category)
                                                @php 
                                                $selected = (!empty(old('categories')) && in_array($category->id, old('categories'))) ? 'selected' : ''; 
                                                @endphp 
                                                <option value="{{$category->id}}" 
                                                        {{$selected}}
                                                        >{{$category->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('categories')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" placeholder="Price $" name="price" value="{{old('price')}}" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="quantityField">Quantity</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-danger decrementBtn" type="button">-</button>
                                                </div>
                                                <input type="text" name="quantity" id="quantityField" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity" value="{{old('quantity')}}"/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-success incrementBtn" type="button">+</button>
                                                </div>
                                            </div>
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control  @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Write your product description here..."></textarea>

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="{{url('products')}}" class="btn btn-secondary float-right">Cancel</a>
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

<script>
//Quantity Button Handling 
    $(".quantityField").val(1);
</script>
@endsection