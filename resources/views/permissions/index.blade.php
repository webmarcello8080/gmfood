@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="container mt-3">
    <h1><i class="fa fa-key"></i>Available Permissions</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Description</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>{{ $permission->description }}</td> 
                    <td>
                        <div class="d-flex justify-content-around">
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>

@endsection