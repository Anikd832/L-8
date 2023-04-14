@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-info text-white">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
    </div>
    <h2> User information</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>id</th>
                    <th>frist name</th>
                    <th>last name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>country</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address_1 }}</td>
                        <td>{{ $user->country }}</td>
                        <td>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                              <i class="fa fa-edit"></i>
                          </a>
                          <form class="d-inline" method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Do you want to delete ?');">
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
