<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInited231f04107fa747c97a54cc89fedb72
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
            0 => __DIR__ . '/../..' . '/src/model/classes/Produit',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInited231f04107fa747c97a54cc89fedb72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInited231f04107fa747c97a54cc89fedb72::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInited231f04107fa747c97a54cc89fedb72::$classMap;

        }, null, ClassLoader::class);
    }
}
