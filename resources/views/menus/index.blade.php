@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="container mt-3">
    <h1><i class="fa fa-book"></i> Your Menus</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Menu Name</th>
                    <th>Menu Type</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td> 
                    <td>{{ $menu->type }}</td> 
                    <td>
                        <div class="d-flex justify-content-around">
                            <a href="{{ URL::to('menus/'.$menu->id.'/edit') }}" class="btn btn-info">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('menus.create') }}" class="btn btn-success">Add New Menu</a>

</div>

@endsection