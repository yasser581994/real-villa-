<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Language;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $banners =  Banner::all();
        $posts = Post::all();
        
 
       // $next_id = Banner::where('id' , '>' , $banners->id)->min('id');

        //$prev_id = Banner::where('id' , '<' , $banners->id)->max('id');

        return view('frontend/index')->with('banners', $banners)->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend/about-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function page(  $lang, $slug )
    {
        $page = Page::where('slug' , $slug)->firstOrFail();
        if ($page->id == 4 || $page->id == 5) {
            return view('frontend/page')->with('page',$page);
        }

    }

    public function subpage($lang , $slug1 , $slug2 )
    {
        $page = Page::where('slug' , $slug1)->firstOrFail();
        $page2 = Page::where('slug' , $slug2)->firstOrFail();
        $posts = Post::where('page_id' , $page2->id)->get();
        if ($page2->id == 2 || $page2->id == 3 )
        {
        return view('frontend/subpage')->with('page2',$page2)->with('page',$page)->with('posts',$posts);
        }
        return redirect()->back();
    }

    public function detailspage ($lang , $slug1 , $slug2 , $slug3 )
    {
        $page = Page::where('slug' , $slug1)->firstOrFail();
        $page2 = Page::where('slug' , $slug2)->firstOrFail();
        $posts = Post::orderBy('id','Desc')->take(3)->get();
        $post = Post::where('slug' , $slug3)->firstOrFail();
        
        return view('frontend/detailspage')->with('page2',$page2)->with('page',$page)->with('posts',$posts)->with('post',$post);
    }


    public function errors()
    {
        return view('frontend.errors');
        
    }
}
