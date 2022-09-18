@extends('template.master')

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
                    <h3>Product</h3>
                    <p class="text-subtitle text-muted">For user to check our product Product</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/product/create')}}" class="btn btn-primary rounded-pill"> + New product </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Recomendation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('images/product/'. $product->photo) }}" width="30%" alt=""></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->recomendation }}</td>
                                <td>
                                    <a href="{{ url('product/'.$product->id. '/edit') }}" class="btn btn-success rounded-pill">edit</a>
                                    <form class="d-inline" action="{{ url('product/'.$product->id) }}" method="post">
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