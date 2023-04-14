@extends('layouts.app')
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        @csrf
        @method('PUT')
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Product name</label>
                    <input type="text" name="product_name" id="form3Example1" class="form-control"
                        value="{{ $product->product_name ?? old('product_name') }}" />
                    @error('product_name')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example2">Product price</label>
                    <input type="text" name="product_price" id="form3Example2" class="form-control"
                        value="{{ $product->product_price ?? old('product_price') }}" />
                    @error('product_price')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Product Quantity</label>
            <input type="number" name="product_quantity" id="form3Example3" class="form-control"
                value="{{ $product->product_quantity ?? old('product_quantity') }}" />
            @error('product_quantity')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Product Thumbnail</label>
            <input type="file" name="product_thumbnail" id="form3Example4" class="form-control" />
        </div>


        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
            <label class="form-check-label" for="form2Example33">
                Hot product
            </label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>or sign up with:</p>
            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
@endsection
