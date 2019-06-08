<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf08dbe64602d77945258a18ab9e6c26d
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf08dbe64602d77945258a18ab9e6c26d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf08dbe64602d77945258a18ab9e6c26d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}