@extends('layouts.app')

@section('title', '| Add New Permission')

@section('content')

<div class='container mt-3'>

    <h1><i class='fa fa-key'></i> Add New Permission</h1>

    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    @if(!$roles->isEmpty()) 
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id, null, ['id' => $role->name ] ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
    @endif

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection