<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda6891ffe9f3a5bcb45e8256d0066794
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bitm\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bitm\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitda6891ffe9f3a5bcb45e8256d0066794::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda6891ffe9f3a5bcb45e8256d0066794::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitda6891ffe9f3a5bcb45e8256d0066794::$classMap;

        }, null, ClassLoader::class);
    }
}
