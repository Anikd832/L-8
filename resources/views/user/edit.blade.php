@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 order-md-1">
        <h4 class="mb-3">User info</h4>
        <form action="{{ route('users.update', $user->id) }}" class="needs-validation" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                    value="{{ $user->first_name ?? old('first_name') }}" required />
                    @error('first_name')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder=""
                    value="{{ $user->last_name ?? old('last_name') }}" required />
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
                      <input
                        type="text"
                        name="username"
                        class="form-control"
                        id="username"
                        placeholder="Username"
                        value="{{ $user->username ?? old('username') }}"
                        required
                    />
                      @error('username')
                        <div class="error text-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="email"
                  placeholder="you@example.com"
                  value="{{ $user->email ?? old('email') }}"
                  required
                />
                @error('email')
                  <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" placeholder="Password"
                      required>
                  @error('password')
                    <div class="error text-danger">{{ $message }}</div>
                  @enderror
            </div>
            </div>
            <div class="col-md-3 mb-3">
              <button class="btn btn-primary btn-block form-control" type="submit"> Update </button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
