<?php

namespace Yajra\CMS\Themes;

use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    /**
     * Base path to look for blade files.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Use the given theme as the current theme.
     *
     * @param string $theme
     * @param bool   $frontend
     */
    public function use($theme, $frontend = true)
    {
        $key      = $frontend ? 'frontend' : 'backend';
        $theme    = $theme ?: config('themes.' . $key, 'default');
        $basePath = config('themes.path.' . $key, base_path('themes/' . $key));
        $this->removeBasePath();
        $this->setBasePath($basePath . DIRECTORY_SEPARATOR . $theme);

        config(['themes.' . $key => $theme]);
    }

    /**
     * Remove base path.
     */
    public function removeBasePath()
    {
        unset($this->paths[0]);
    }

    /**
     * Set file view finder base path.
     *
     * @param $path
     */
    public function setBasePath($path)
    {
        $this->basePath = $path;

        array_unshift($this->paths, $this->basePath);
    }
}




