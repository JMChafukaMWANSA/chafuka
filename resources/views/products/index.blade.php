@extends('products.layouts')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
                <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
                <div class="container mt-5">
                    <form method="GET" action="">
                    @csrf
                </div>

            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">S#</th>
                            <th scope="col">product</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->product }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route( 'products.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <a href="/delete/{{ $product->id }}">

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                        </tbody>
                    </table>


                </div>
            </div>
                <script>
                    let table = new DataTable('#myTable');
                    // $(document).ready( function () {
                    //     $('#myTable').DataTable();
                    // } );
                </script>
        </div>
    </div>

@endsection
