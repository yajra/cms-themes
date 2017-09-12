<?php

namespace Yajra\CMS\Themes\Middleware;

use Closure;
use Yajra\CMS\Themes\Facades\Theme;

class RuntimeTheme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $theme
     * @return mixed
     */
    public function handle($request, Closure $next, $theme = null)
    {
        Theme::use($theme);

        return $next($request);
    }
}
