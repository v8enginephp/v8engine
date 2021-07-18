<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2dfc0da59bdb2d0a3b15e8f3eaaad20
{
    public static $files = array (
        'b4546c0f2c36e376009e1ef09f264d2d' => __DIR__ . '/../..' . '/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Module\\JWT\\Model\\' => 17,
            'Module\\JWT\\Middleware\\' => 22,
            'Module\\JWT\\Controller\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Module\\JWT\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database/Model',
        ),
        'Module\\JWT\\Middleware\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Http/Middleware',
        ),
        'Module\\JWT\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Http/Controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2dfc0da59bdb2d0a3b15e8f3eaaad20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2dfc0da59bdb2d0a3b15e8f3eaaad20::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
