<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banners.index')->with('banners' , $banners);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = Banner::all();
        return view('backend.banners.create')->with('banners' , $banners);
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
            'name.*' => 'string|required|max:100',
            'sort' => 'required|numeric|min:0',
            'banner' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        
        if($request->has('banner'))
        {

            $banner = $request->file('banner')->store('pages','public');
 
        };

        Banner::create([
            'name' => $request->name,
            'sort' => $request->sort,
            'status' =>$request->status,
            'banner' =>$banner,
      
            ]);

            session()->flash('success' , 'User Created Successfully.');
        return redirect()->route('banners.index');
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
    public function edit($id)
    {
        $banner = Banner::findorfail($id);

        return view('backend.banners.edit')->with('banner' , $banner);
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
        $request->validate([
            'name.*' => 'string|required|max:100',
            'sort' => 'required|numeric|min:0',
            'banner' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        
        if($request->has('banner'))
        {

            $banner = $request->file('banner')->store('pages','public');
 
        };

        Banner::findorfail($id)->update([
            'name' => $request->name,
            'sort' => $request->sort,
            'status' =>$request->status,
            'banner' =>$banner,
      
            ]);

            session()->flash('success' , 'User edit Successfully.');
            return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findorfail($id);
        Storage::disk('public')->delete($banner->image);
         $banner->delete();
        return redirect()->route('banners.index');
    }
}
