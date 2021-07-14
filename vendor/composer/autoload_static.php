<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit93a3d720dce5030c864bc31b074f561e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit93a3d720dce5030c864bc31b074f561e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit93a3d720dce5030c864bc31b074f561e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit93a3d720dce5030c864bc31b074f561e::$classMap;

        }, null, ClassLoader::class);
    }
}
