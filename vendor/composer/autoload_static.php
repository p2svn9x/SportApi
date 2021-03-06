<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit66a591ffec70c98c24707c1aa7fd900a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit66a591ffec70c98c24707c1aa7fd900a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit66a591ffec70c98c24707c1aa7fd900a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
