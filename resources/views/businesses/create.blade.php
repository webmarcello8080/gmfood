@extends('layouts.app')

@section('title', '| Add New Business')

@section('content')

<div class="container mt-3">

   <h1><i class="fa fa-briefcase"></i> Add New Business</h1>

   {!! Form::open(array('url' => 'businesses')) !!}

   <div class="form-group">
      {!! Form::label('name', 'Company Name') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('address', 'Company Address') !!}
         {!! Form::text('address', '', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('address2', 'Company Address 2') !!}
         {!! Form::text('address2', '', ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('postcode', 'Company Postcode') !!}
         {!! Form::text('postcode', '', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('city', 'City') !!}
         {!! Form::text('city', '', ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('phone_number', 'Company Phone Number') !!}
         {!! Form::text('phone_number', '', ['class' => 'form-control']) !!}
      </div>
      <div class="form-group col-md-6">
         {!! Form::label('email', 'Company Email') !!}
         {!! Form::email('email', '', ['class' => 'form-control']) !!}
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6">
         {!! Form::label('website', 'Website') !!}
         {!! Form::text('website', '', ['class' => 'form-control']) !!}
      </div>
   </div>

   {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

   {!! Form::close() !!}
</div>

@endsection