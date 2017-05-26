<?php

namespace Yajra\CMS\Themes;

use Closure;

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
        $theme = $theme ?: config('themes.frontend', 'default');

        $finder   = app('themes.view.finder');
        $basePath = config('themes.path.frontend', base_path('themes/frontend'));
        $finder->removeBasePath();
        $finder->setBasePath($basePath . DIRECTORY_SEPARATOR . $theme);

        config(['themes.frontend' => $theme]);

        return $next($request);
    }
}
