<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Business;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        //Get all users and pass it to the view
        if(Auth::user()->hasRole('SuperAdmin')){
            $users = User::get();
        } else {
            $current_business = Auth::user()->business;
            if(Auth::user()->hasRole('Admin')){
                $users = User::where('business_id', $current_business->id)->role(['Admin', 'Supervisor', 'Employee'])->get();
            } elseif (Auth::user()->hasRole('Supervisor')) {
                $users = User::where('business_id', $current_business->id)->role(['Supervisor', 'Employee'])->get();
            }
        }

        return view('users.index')->with('users', $users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
        //Get all roles and pass it to the view
        $roles = Role::get();
        $businesses = Business::pluck('name', 'id');

        return view('users.create', ['roles' => $roles, 'businesses' => $businesses]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'business_id'=>'required|integer'
        ]);

        $user = User::create($request->only('email', 'name', 'password', 'business_id')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users'); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $businesses = Business::pluck('name', 'id');

        if(!Auth::user()->hasRole('SuperAdmin')){
            $current_business = Auth::user()->business;
            if($user->business_id != $current_business->id){
                abort('401');
            }
        }

        return view('users.edit', compact('user', 'roles', 'businesses')); //pass user and roles data to view
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email    
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'business_id'=>'integer'
        ]);
        $input = $request->only(['name', 'email', 'business_id']); //Retreive the name, email
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User ' . $user->name .  ' has been blocked.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function active($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User ' . $user->name .  ' has been activated.');
    }
}