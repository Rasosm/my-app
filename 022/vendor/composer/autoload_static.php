<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92c4e09a9651bc009397e25b29a311d9
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit92c4e09a9651bc009397e25b29a311d9::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit92c4e09a9651bc009397e25b29a311d9::$classMap;

        }, null, ClassLoader::class);
    }
}
