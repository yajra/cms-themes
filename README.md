# YajraCMS - Themes Module (WIP)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

YajraCMS is a Joomla! inspired CMS built with Laravel PHP Framework.
This is the themes module of YajraCMS and should be used along with the YajraCMS Platform.

## Install

Via Composer

``` bash
$ composer require yajra/cms-themes
```

## Usage

Just register `Yajra\CMS\Themes\ThemesServiceProvider::class` on your providers.

``` php
public function register()
{
    $this->app->register(\Yajra\CMS\Themes\ThemesServiceProvider::class);
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email aqangeles@gmail.com instead of using the issue tracker.

## Credits

- [Arjay Angeles][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/yajra/cms-themes.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/yajra/cms-themes/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/yajra/cms-themes.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/yajra/cms-themes.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/yajra/cms-themes.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/yajra/cms-themes
[link-travis]: https://travis-ci.org/yajra/cms-themes
[link-scrutinizer]: https://scrutinizer-ci.com/g/yajra/cms-themes/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/yajra/cms-themes
[link-downloads]: https://packagist.org/packages/yajra/cms-themes
[link-author]: https://github.com/yajra
[link-contributors]: ../../contributors
