@extends('template.master')
@section('title', 'Create Product - Syntop')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Product</h3>
                    <p class="text-subtitle text-muted">Add new product to frontend apps</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/product') }}">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                                    @error('name') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Price</label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price') }}">
                                    @error('price') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Description</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" type="text" name="desc">{{ old('desc') }}</textarea>
                                    @error('desc') 
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Product Photo</label>
                                    <input class="form-control" type="file" name="photo">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Brand</label>
                                    <select class="form-control" name="brand_id">
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="form-label">Product Type</label>
                                    <select class="form-control" name="type">
                                        <option>laptop</option>
                                        <option>acc</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="form-label">Product Type</label>
                                    <select class="form-control" name="recomendation">
                                        <option>true</option>
                                        <option>false</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
