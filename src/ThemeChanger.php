<?php

namespace Yajra\CMS\Themes;

use Closure;

class ThemeChanger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->query('tmpl')) {
            $finder   = app('themes.view.finder');
            $basePath = config('themes.path.frontend', base_path('themes')) . DIRECTORY_SEPARATOR . $request->query('tmpl');
            $finder->setBasePath($basePath);
        }

        return $next($request);
    }
}
