<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Massage;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('AllLanguages', Language::all()); 
        View::share('Users', User::all()); 
        View::share('Posts', Post::all()); 
        View::share('Messages', Massage::all()); 
        View::share('Pages', Page::all()); 
        View::share('lang', request()->segment(1)); 
        View::share('pages',Page::where('page_id' , 0)->get());
        View::share('twoposts',Post::orderBy('id','Desc')->take(2)->get());
        View::share('settings', Setting::all());
        View::share('lasttsetting', Setting::orderBy('id','Desc')->take(1)->get());
        View::share('threeposts',Post::orderBy('id','Desc')->take(3)->get());
        View::share('aboutpage',Page::where('id' , 5)->firstOrFail());
        View::share('footer_pages',Page::where('position' , 'header and footer')->orWhere('position' , 'footer')->get());
        View::share('header_pages',Page::where('page_id' , '=' , 0)->where('position' , '<>' , 'footer')->get());

        $url = '/';
        foreach (request()->segments() as $key => $segment) 
        {
            if ($key !== 0)
                {
                    $url .= $segment . '/';
                }
        }
        View::share('url', $url);

        
    }
}
