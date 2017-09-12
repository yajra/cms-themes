<?php

namespace Yajra\CMS\Themes;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Yajra\CMS\Themes\Controller\ThemesController;
use Yajra\CMS\Themes\Repositories\CollectionRepository;
use Yajra\CMS\Themes\Repositories\Repository;

class ThemesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var \Illuminate\View\Factory $view */
        $view   = $this->app['view'];
        $finder = $view->getFinder();
        $hints  = $finder->getHints();
        $view->setFinder($this->app['themes.view.finder']);
        foreach ($hints as $namespace => $path) {
            $view->addNamespace($namespace, $path);
        }

        $this->registerConfig();
        $this->registerViews();
        $this->registerLang();
        $this->registerRoute();

        $this->registerAdminTheme();

        /** @var \Yajra\CMS\Themes\Repositories\Repository $themes */
        $themes = $this->app['themes'];
        $themes->scan();
    }

    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/config/themes.php' => config_path('themes.php'),
        ], 'cms-themes');
        $this->mergeConfigFrom(__DIR__ . '/config/themes.php', 'themes');
    }

    /**
     * Register themes view namespace.
     */
    protected function registerViews()
    {
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/themes'),
        ], 'cms-themes');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'themes');
    }

    /**
     * Register translations.
     */
    protected function registerLang()
    {
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'themes');
    }

    /**
     * Register administrator/themes routes.
     */
    protected function registerRoute()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];
        $router->group(['prefix' => admin_prefix(), 'middleware' => 'administrator'], function () use ($router) {
            $router->get('themes', ThemesController::class . '@index')->name('administrator.themes.index');
            $router->get('themes/create', ThemesController::class . '@create')->name('administrator.themes.create');
            $router->post('themes', ThemesController::class . '@store')->name('administrator.themes.store');
            $router->get('themes/{theme}', ThemesController::class . '@edit')->name('administrator.themes.edit');
            $router->put('themes/{theme}', ThemesController::class . '@update')->name('administrator.themes.update');
            $router->delete('themes/{theme}', ThemesController::class . '@destroy')
                   ->name('administrator.themes.destroy');
        });
    }

    /**
     * Register admin view namespace.
     */
    protected function registerAdminTheme()
    {
        $adminTheme = config('themes.backend', 'default');
        $basePath   = config('themes.path.backend', base_path('themes/backend'));
        $this->loadViewsFrom($basePath . DIRECTORY_SEPARATOR . $adminTheme, 'admin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('themes.view.finder', function ($app) {
            $finder   = new ThemeViewFinder($app['files'], $app['config']['view.paths']);
            $basePath = config('themes.path.frontend', base_path('themes/frontend'));
            $theme    = config('themes.frontend', 'default');
            $finder->setBasePath($basePath . DIRECTORY_SEPARATOR . $theme);

            return $finder;
        });

        $this->app->singleton('themes', function () {
            return new CollectionRepository(new Finder, $this->app['config']);
        });

        $this->app->alias('themes', Repository::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'themes',
            'themes.view.finder',
        ];
    }
}
