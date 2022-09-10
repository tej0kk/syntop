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
                    <h3>Brand</h3>
                    <p class="text-subtitle text-muted">For user to check our product brand</p>
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
                    <a href="{{url('/brand/create')}}" class="btn btn-primary rounded-pill"> + New brand </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td><img src="{{ asset('images/brand/'. $brand->icon) }}" width="30%" alt=""></td>
                                <td>{{ $brand->icon }}</td>
                                <td>
                                    <a href="{{ url('brand/'.$brand->id. '/edit') }}" class="btn btn-success rounded-pill">edit</a>
                                    <form class="d-inline" action="{{ url('brand/'.$brand->id) }}" method="post">
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