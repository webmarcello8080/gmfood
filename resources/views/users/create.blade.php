@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class="container mt-3">

    <h1><i class="fa fa-user-plus"></i> Add User</h1>
    <hr>

    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    @role('SuperAdmin')
        <div class="form-group">
            {{ Form::label('business_id', 'Business') }}
            {{ Form::select('business_id', $businesses,  null, array('class' => 'form-control', 'placeholder' => 'Please Select...')) }}
        </div>
    @else
        {{ Form::hidden('business_id', Auth::user()->business->id) }}
    @endrole

    @include ('roles.role-checkboxes')

    <div class="form-row">
        <div class="form-group col-md-6">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('password', 'Confirm Password') }}
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection