@extends('layouts.app')

@section('title', '| Edit Permission')

@section('content')

<div class="container mt-3">

    <h1><i class="fa fa-key"></i> Edit {{$permission->name}}</h1>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', $permission->name, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', $permission->description, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) }}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection