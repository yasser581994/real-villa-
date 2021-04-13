<?php

namespace App\Http\Controllers;

use App\Models\Subscripe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscripes = Subscripe::all();
        return view('backend.subscripe.index')->with('subscripes' , $subscripes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subscripe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
     */
    
    public function store(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        Subscripe::create([
            'email' => $request->email,
        ]);

        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit($id)
    {
        $subscripe = Subscripe::findorfail($id);

        return view('backend.subscripe.edit')->with('subscripe' , $subscripe);
    }
        */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        Subscripe::find($id)->update([
            'email' => $request->email,
        ]);
        return redirect()->route('subscripe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscripe = Subscripe::findorfail($id);
        $subscripe->delete();
       return redirect()->back();
    }
}
