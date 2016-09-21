<?php

if (! function_exists('theme_asset')) {
    /**
     * Get theme public path.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function theme_asset($path = '', $secure = null)
    {
        $path = $path ? DIRECTORY_SEPARATOR . $path : $path;

        return asset('themes' . DIRECTORY_SEPARATOR . config('themes.frontend', 'default') . $path, $secure);
    }
}
