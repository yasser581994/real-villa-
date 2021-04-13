<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Page;
use Illuminate\Http\Request;

class HandleParentPagesMiddleware
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
        $page = Page::where('slug', $request->segment(2))->firstorfail();
        if($page->childs()->count() > 0)
        {
          return redirect()->route('error.page'); 
        } else {
            return $next($request); 
        }
    }
}
