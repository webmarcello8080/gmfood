@extends('layouts.app')

@section('title', '| Edit Menu')

@section('content')

<div class="container mt-3">

    <h1><i class="fa fa-key"></i> Edit {{$menu->name}} Menu</h1>
    {{ Form::model($menu, array('route' => array('menus.update', $menu->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Menu Name') }}
        {{ Form::text('name', $menu->name, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
         {!! Form::label('type', 'Menu Type') !!}
         {!! Form::select('type', ['food' => 'Food', 'beverage' => 'Beverage'], $menu->type, ['class' => 'form-control', 'placeholder' => 'Please Select...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('expected_gp', 'Expected GP') !!}
        {!! Form::text('expected_gp', $menu->expected_gp, ['class' => 'form-control']) !!}
    </div>

    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection