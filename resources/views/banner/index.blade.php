@extends('template.master')
@section('title', 'Syntop - Banner')
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
                    <h3>Banner</h3>
                    <p class="text-subtitle text-muted">For user to check our product banner</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/banner/create')}}" class="btn btn-primary rounded-pill"> + New Banner </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td>{{ $banner->name }}</td>
                                <td><img src="{{ asset('images/banner/'. $banner->name) }}" width="30%" alt=""></td>
                                <td>{{ $banner->photo }}</td>
                                <td>
                                    <a href="{{ url('banner/'.$banner->id. '/edit') }}" class="btn btn-success rounded-pill">edit</a>
                                    <form class="d-inline" action="{{ url('banner/'.$banner->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger rounded-pill">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection