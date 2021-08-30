<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = new Business();
        $businesses = $business->orderBy('name')->get();

        return view('businesses.index')->with('businesses', $businesses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:businesses',
            'address' => 'required|max:255',
            'address2' => 'nullable|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
            'phone_number' => 'nullable|numeric',
            'email' => 'nullable|email',
            'website' => 'nullable|max:255'
        ]);

        $business = new Business();
        $business->name = $request['name'];
        $business->address = $request['address'];
        $business->address2 = $request['address2'];
        $business->postcode = $request['postcode'];
        $business->city = $request['city'];
        $business->phone_number = $request['phone_number'];
        $business->email = $request['email'];
        $business->website = $request['website'];

        $business->save();

        return redirect()->route('businesses.index')
            ->with('flash_message',
            'Business '. $business->name .' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('businesses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::findOrFail($id);

        return view('businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = new Business();
        $business = $business->findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255|unique:businesses',
            'address' => 'required|max:255',
            'address2' => 'nullable|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
            'phone_number' => 'nullable|numeric',
            'email' => 'nullable|email',
            'website' => 'nullable|max:255'
        ]);
        $input = $request->all();
        $business->fill($input)->save();

        return redirect()->route('businesses.index')
            ->with('flash_message',
             'Business '. $business->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::findOrFail($id);

        //Make it impossible to delete this specific permission    
        if (true) {
            return redirect()->route('businesses.index')
            ->with('flash_message',
            'This operation is not allowed!');
        }

        $business->delete();

        return redirect()->route('businesses.index')
            ->with('flash_message',
            'Business deleted!');
    }
}
