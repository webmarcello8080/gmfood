@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<div class="container mt-3">

    <h1><i class="fa fa-user-plus"></i> Edit {{$user->name}}</h1>
    <hr>

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    @role('SuperAdmin')
        <div class="form-group">
            {{ Form::label('business_id', 'Business') }}
            {{ Form::select('business_id', $businesses, $user->business ? $user->business->id : '', array('class' => 'form-control', 'placeholder' => 'Please Select...')) }}
        </div>
    @else
        {{ Form::hidden('business_id', Auth::user()->business->id) }}
    @endrole

    <h5><b>Give Role</b></h5>

    @include ('roles.role-checkboxes')

    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection