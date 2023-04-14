@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-info text-white">
                <i class="fa fa-plus"></i> Create
            </a>
            {{-- <a href="{{ route('products.{1}.show') }}" class="btn btn-sm btn-primary text-white">
			<i class="fa fa-plus"></i> Show All
		</a> --}}
        </div>
    </div>
    <h2> product information</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->product_quantity }}</td>
                        <td>{{ $product->product_thumbnail }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary text-white">
                                    <i class="fa fa-plus"></i> Show 
		                    </a>
                            <form class="d-inline" method="POST" action="{{ route('products.destroy', $product->id) }}"
                                onsubmit="return confirm('Do you want to delete ?');">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger delete-user">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center text danger">
                        <td calspan="50">Nothing to show</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
