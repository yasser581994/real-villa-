<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::where('id' , $id)->firstOrFail();
        $galleries = Gallery::where('post_id' , $post->id)->get();
        return view('backend/galleries/index')->with('galleries',$galleries)->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::where('id' , $id)->firstOrFail();
        return view('backend/galleries/create')->with('post' , $post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $post = Post::where('id' , $id)->firstOrFail();
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($request->has('image'))
        {
            $image = $request->file('image')->store('galleries','public');
        };

        Gallery::create([
            'post_id' => $post->id,
            'image' => $image,
            ]);

            return redirect()->route('posts.index');
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
        $gallery = Gallery::findorfail($id);
        $posts = Post::all();
        return view('backend.galleries.edit')->with('posts' , $posts)->with('gallery' , $gallery);
        
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
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $gallery = Gallery::findorfail($id);
        Storage::disk('public')->delete($gallery->image);


        if($request->has('image'))
        {
            $image = $request->file('image')->store('galleries','public');
        };
        
        Gallery::findorfail($id)->update([
            'image' => $image,
            ]);

            return redirect()->route('posts.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $galleries = Gallery::findorfail($id);
         Storage::disk('public')->delete($galleries->image);
         $galleries->delete();

        return redirect()->back();
    }
}
