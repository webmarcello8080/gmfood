{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="container mt-3">
    <h1><i class="fa fa-users"></i> User Administration</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                            @if ($user->status == 1)
                                <a href="{{ route('users.active', $user->id) }}" class="btn btn-danger">Block</a>
                            @else
                                <a href="{{ route('users.active', $user->id) }}" class="btn btn-info">Activate</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

</div>

@endsection