<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $posts = Post::all();
        return view('backend.posts.index')->with('pages' , $pages)->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        $posts = Post::all();
        return view('backend.posts.create')->with('pages' , $pages)->with('posts' , $posts);
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
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'price' => 'required',
            'size' => 'required',
            'year_of_build' =>'required',
        ]);

        if($request->has('image'))
        {

            $image = $request->file('image')->store('pages','public');
 
        };
        Post::create([
            'page_id' => $request->page_id,
            'name' => $request->name,
            'content' => $request->content,
            'slug' =>Str::slug( $request->name['en'] ),
            'image' => $image,
            'price' => $request->price,
            'period' => $request->period,
            'price_metter' => $request->price_metter,
            'number_of_floors' => $request->number_of_floors,
            'number_of_flats' => $request->number_of_flats,
            'size' => $request->size,
            'year_of_build' => $request->year_of_build,
            'address' => $request->address,
            'rooms' => $request->rooms,
            'badrooms' => $request->badrooms,
            'garage' => $request->garage,
            'gas' => $request->gas,
            'evelador' => $request->evelador,
            'floor' => $request->floor,
            'hot' => $request->hot,
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
        $pages = Page::all();
        $post = Post::findorfail($id);
        $posts = Post::all();
        return view('backend/posts/edit')->with('post' ,$post )->with('posts' ,$posts )->with('pages' ,$pages );
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
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'price' => 'required',
            'size' => 'required',
            'year_of_build' =>'required',

        ]);

        if($request->has('image'))
        {

            $image = $request->file('image')->store('pages','public');
 
        };

        
        Post::find($id)->update([

            'page_id' => $request->page_id,
            'name' => $request->name,
            'content' => $request->content,
            'slug' =>Str::slug( $request->name['en']) ,
            'image' => $image,
            'price' => $request->price,
            'period' => $request->period,
            'price_metter' => $request->price_metter,
            'number_of_floors' => $request->number_of_floors,
            'number_of_flats' => $request->number_of_flats,
            'size' => $request->size,
            'year_of_build' => $request->year_of_build,
            'address' => $request->address,
            'rooms' => $request->rooms,
            'badrooms' => $request->badrooms,
            'garage' => $request->garage,
            'gas' => $request->gas,
            'evelador' => $request->evelador,
            'floor' => $request->floor,
            'hot' => $request->hot,
        ]);

        return redirect( route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        Storage::disk('public')->delete($post->image);
         $post->delete();
        return redirect()->route('posts.index');
    }
}
