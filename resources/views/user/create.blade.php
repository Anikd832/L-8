@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">User info</h4>
        <form action="{{ route('users.store') }}" class="needs-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                        value="{{ old('first_name')}}" required>
                    @error('first_name')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder=""
                        value="{{ old('last_name')}}" required>
                    @error('last_name')
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="username">Username</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                      </div>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                           value="{{ old('username')}}">
                      @error('username')
                        <div class="error text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="username">Password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                    @error('username')
                      <div class="error text-danger">{{ $message }}</div>
                    @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="email"
                  placeholder="you@example.com"
                  value="{{ old('email')}}"
                  required
                />
                @error('email')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="address">address</label>
                <input
                  type="address"
                  name="address"
                  class="form-control"
                  id="address"
                  placeholder="address"
                  value="{{ old('address')}}"
                  required
                />
                @error('address')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="country">country</label>
                <input
                  type="country"
                  name="country"
                  class="form-control"
                  id="country"
                  placeholder="country"
                  value="{{ old('country')}}"
                  required
                />
                @error('country')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="state">zip</label>
                <input
                  type="numbaer"
                  name="state"
                  class="form-control"
                  id="state"
                  placeholder="state"
                  value="{{ old('state')}}"
                  required
                />
                @error('state')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="zip">zip</label>
                <input
                  type="numbaer"
                  name="zip"
                  class="form-control"
                  id="zip"
                  placeholder="zip"
                  value="{{ old('zip')}}"
                  required
                />
                @error('zip')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <button class="btn btn-primary btn-block form-control" type="submit"> Save </button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
