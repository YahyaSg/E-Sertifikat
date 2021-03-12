<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62c820a7910b881a09a22c95f47297d3
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fpdf\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/fpdf/fpdf/src/Fpdf',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62c820a7910b881a09a22c95f47297d3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62c820a7910b881a09a22c95f47297d3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
