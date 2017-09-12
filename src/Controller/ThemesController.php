<?php

namespace Yajra\CMS\Themes\Controller;

use Illuminate\Http\Request;
use Yajra\CMS\Entities\Configuration;
use Yajra\CMS\Http\Controllers\Controller;
use Yajra\CMS\Themes\Repositories\Repository;

class ThemesController extends Controller
{
    /**
     * @var \Yajra\CMS\Themes\Repositories\Repository
     */
    protected $themes;

    /**
     * ThemesController constructor.
     *
     * @param \Yajra\CMS\Themes\Repositories\Repository $themes
     */
    public function __construct(Repository $themes)
    {
        $this->authorizePermissionResource('theme');
        $this->themes = $themes;
    }

    /**
     * Display themes resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $themes = $this->themes->all()->where('type', 'frontend');

        return view('themes::index', compact('themes'));
    }

    /**
     * Store new default theme.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'theme' => 'required',
        ]);

        /** @var Configuration $config */
        $config        = Configuration::query()->firstOrCreate(['key' => 'themes.frontend']);
        $config->value = $request->get('theme');
        $config->save();

        flash()->success(trans('themes::theme.success', ['theme' => $request->get('theme')]));

        return back();
    }

    /**
     * Uninstall a theme.
     *
     * @param string $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($theme)
    {
        if ($this->themes->uninstall($theme)) {
            flash()->success(trans('themes::theme.deleted', compact('theme')));
        } else {
            flash()->error(trans('themes::theme.error', compact('theme')));
        }

        return back();
    }
}
