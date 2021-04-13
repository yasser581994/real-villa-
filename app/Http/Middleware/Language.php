<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        // $page = Page::where('slug', $request->segment(2))->firstorfail();
        // if($page !== null)
        // {
        //     response()->view('errors.404'); 
            
        // } 

        if (! in_array(request()->segment(1), ['en', 'ar'])) {
            return redirect()->to('/en');
        }

        if ($request->lang <> '') {
            app()->setLocale($request->lang);
        } else {
            app()->setLocale('en');
            return redirect()->to('/en');
        }
            return $next($request);
    }
}
