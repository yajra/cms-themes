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
     */
    public function use($theme)
    {
        $theme    = $theme ?: config('themes.frontend', 'default');
        $basePath = config('themes.path.frontend', base_path('themes/frontend'));
        $this->removeBasePath();
        $this->setBasePath($basePath . DIRECTORY_SEPARATOR . $theme);

        config(['themes.frontend' => $theme]);
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




