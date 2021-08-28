@extends('layouts.app')

@section('title', '| Businesses')

@section('content')

<div class="container mt-3">
   <h1><i class="fa fa-briefcase"></i>Businesses

   <a href="{{ route('users.index') }}" class="btn btn-outline-info pull-right mx-1">Users</a></h1>
   <hr>

   <div class="table-responsive">
      <table class="table table-bordered table-striped">
         <thead>
               <tr>
                  <th>Business</th>
                  <th>City</th>
                  <th>Email</th>
                  <th>Operation</th>
               </tr>
         </thead>
         <tbody>
               @foreach ($businesses as $business)
               <tr>
                  <td>{{ $business->name }}</td> 
                  <td>{{ $business->city }}</td> 
                  <td>{{ $business->email }}</td> 
                  <td>
                  <a href="{{ URL::to('businesses/'.$business->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                  {!! Form::open(['method' => 'DELETE', 'route' => ['businesses.destroy', $business->id] ]) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}

                  </td>
               </tr>
               @endforeach
         </tbody>
      </table>
   </div>


   <a href="{{ URL::to('businesses/create') }}" class="btn btn-success">Add Business</a>

</div>

@endsection