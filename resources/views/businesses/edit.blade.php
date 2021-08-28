@extends('layouts.app')

@section('title', '| Edit Business')

@section('content')

<div class="container mt-3">

   <h1><i class="fa fa-briefcase"></i> Edit {{$business->name}}</h1>
   {{ Form::model($business, array('route' => array('businesses.update', $business->id), 'method' => 'PUT')) }}

   <div class="form-group">
      {!! Form::label('name', 'Company Name') !!}
      {!! Form::text('name', $business->name, ['class' => 'form-control']) !!}
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('address', 'Company Address') !!}
         {!! Form::text('address', $business->address, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('address2', 'Company Address 2') !!}
         {!! Form::text('address2', $business->address2, ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('postcode', 'Company Postcode') !!}
         {!! Form::text('postcode', $business->postcode, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('city', 'City') !!}
         {!! Form::text('city', $business->city, ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('phone_number', 'Company Phone Number') !!}
         {!! Form::text('phone_number', $business->phone_number, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('email', 'Company Email') !!}
         {!! Form::email('email', $business->email, ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('website', 'Website') !!}
         {!! Form::text('website', $business->website, ['class' => 'form-control']) !!}
      </div>
   </div>

   {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}

   {!! Form::close() !!}

</div>

@endsection