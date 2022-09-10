@extends('template.master')
@section('title', 'Edit Brand - Syntop')
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
                    <h3>Edit Brand</h3>
                    <p class="text-subtitle text-muted">Update brand to frontend apps</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/brand') }}">Brand</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Brand</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update New Brand</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/brand/' . $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand" class="form-label">Brand Name</label>
                                    <input class="form-control" type="text" id="formFile" name="name" value="{{$brand->name}}">
                                    <div class="invalid-feedback">
                                        Please enter a message in the textarea.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Brand Icon</label>
                                    <input class="form-control" type="file" id="formFile" name="icon">
                                    <img src="{{ asset('images/brand/' . $brand->icon) }}" width="30%" alt="lara">
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
