<?php

namespace Yajra\CMS\Themes;

use Closure;
use Yajra\CMS\Themes\Facades\Theme;

class ThemeChanger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($theme = $request->query('cms-theme')) {
            Theme::use($theme);
        }

        return $next($request);
    }
}
