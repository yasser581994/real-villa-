<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('backend/pages/index')->with('pages' , $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('backend/pages/create')->with('pages' , $pages);

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
            'content.*' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($request->has('image'))
        {

            $image = $request->file('image')->store('pages','public');
 
        };
        if($request->has('banner'))
        {

            $banner = $request->file('banner')->store('pages','public');
 
        };

        Page::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name['en']) ,
            'content' => $request->content,
            'image' => $image,
            'banner' => $banner,
            'page_id' => $request->page_id,
            'position' => $request->position,
            'sort' => $request->sort,

        ]);

        return redirect()->route('pages.index');

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
        $editpage = Page::findorfail($id);
        $pages = Page::all();
        return view('backend/pages/edit')->with('editpage' ,$editpage )->with('pages' ,$pages );
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
            'content.*' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $page = Page::findorfail($id);
        Storage::disk('public')->delete($page->image);
        Storage::disk('public')->delete($page->banner);

        if($request->has('image'))
        {

            $image = $request->file('image')->store('pages','public');
 
        };
        if($request->has('banner'))
        {

            $banner = $request->file('banner')->store('pages','public');
 
        };
        
        Page::find($id)->update([

            'name' => $request->name,
            'slug' => Str::slug($request->name['en']) ,
            'content' => $request->content,
            'image' => $image,
            'banner' => $banner,
            'page_id' => $request->page_id,
            'position' => $request->position,
            'sort' => $request->sort,
        ]);

        return redirect( route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findorfail($id);
        Storage::disk('public')->delete($page->image);
        Storage::disk('public')->delete($page->banner);
         $page->delete();

        return redirect()->route('pages.index');
    }
}
