<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit819be095a6eb280c52222beade1c631a
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit819be095a6eb280c52222beade1c631a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit819be095a6eb280c52222beade1c631a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit819be095a6eb280c52222beade1c631a::$classMap;

        }, null, ClassLoader::class);
    }
}
