<div class='form-group'>
   @foreach ($roles as $role)
      @if (Auth::user()->hasRole('SuperAdmin'))
         {{ Form::checkbox('roles[]',  $role->id, null, ['id' => $role->name] ) }}
         {{ Form::label($role->name, ucfirst($role->name)) }}<br>
      @endif
      @if (Auth::user()->hasRole('Admin') && ($role->name == 'Supervisor' || $role->name == 'Employee'))
         {{ Form::checkbox('roles[]',  $role->id, null, ['id' => $role->name] ) }}
         {{ Form::label($role->name, ucfirst($role->name)) }}<br>
      @endif
      @if (Auth::user()->hasRole('Supervisor') && ($role->name == 'Employee'))
         {{ Form::checkbox('roles[]',  $role->id, null, ['id' => $role->name] ) }}
         {{ Form::label($role->name, ucfirst($role->name)) }}<br>
      @endif
   @endforeach
</div>