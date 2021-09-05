<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Menu;
use Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = new Menu();
        if(Auth::user()->hasRole('SuperAdmin')){
            $menus = $menus->orderBy('created_at')->get();
        } else {
            $menus = $menus->where('business_id', Auth::user()->business_id)->orderBy('created_at')->get();
        }

        return view('menus.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business_id = Auth::user()->business_id;
        $business = Business::where('id', '=', $business_id)->firstOrFail();

        return view('menus.create')->with('business', $business);
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
            'name' => 'required|max:255',
            'type' => 'required',
            'business_id' => 'required|integer',
            'expected_gp' => 'nullable|numeric',
        ]);

        $menu = new Menu();
        $menu->name = $request['name'];
        $menu->type = $request['type'];
        $menu->business_id = $request['business_id'];
        $menu->expected_gp = $request['expected_gp'];

        $menu->save();

        return redirect()->route('menus.index')
            ->with('flash_message',
            'New Menu correctly added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        if($menu->business_id != Auth::user()->business_id){
            abort('401');
        }

        return view('menus.edit')->with('menu', $menu);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'required',
            'expected_gp' => 'nullable|numeric',
        ]);

        $menu = Menu::find($id);
        $menu->name = $request['name'];
        $menu->type = $request['type'];
        $menu->expected_gp = $request['expected_gp'];

        $menu->save();

        return redirect()->route('menus.index')
            ->with('flash_message',
            'Menu correctly udpated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
