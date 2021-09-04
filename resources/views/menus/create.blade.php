@extends('layouts.app')

@section('title', '| Add New Menu')

@section('content')

<div class='container mt-3'>

    <h1><i class='fa fa-book'></i> Add New Menu</h1>

    {{ Form::open(array('url' => 'menus')) }}

    <div class="form-group">
        {{ Form::label('name', 'Menu Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
         {!! Form::label('type', 'Menu Type') !!}
         {!! Form::select('type', ['food' => 'Food', 'beverage' => 'Beverage'], null, ['class' => 'form-control', 'placeholder' => 'Please Select...']) !!}
    </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('business', 'Company Name') !!}
         {!! Form::text('business', $business->name, ['class' => 'form-control', 'readonly']) !!}
         {!! Form::hidden('business_id', $business->id, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('expected_gp', 'Expected GP') !!}
         {!! Form::text('expected_gp', '', ['class' => 'form-control']) !!}
      </div>
   </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection