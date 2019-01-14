<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbba6f7b6fe7300f64d80eb305ac4c547
{
    public static $files = array (
        '32ce8978fde774ab07e5cab56dad7c42' => __DIR__ . '/../..' . '/framework/lib/function.php',
        '08e4f69a40724c463e3b562b92efb153' => __DIR__ . '/../..' . '/framework/config/app.config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NewFrame\\Controller\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NewFrame\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework/controller',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbba6f7b6fe7300f64d80eb305ac4c547::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbba6f7b6fe7300f64d80eb305ac4c547::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbba6f7b6fe7300f64d80eb305ac4c547::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}