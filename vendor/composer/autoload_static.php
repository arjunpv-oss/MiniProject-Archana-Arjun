<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita3e63d9e15c1ac0304080ab21c2adff7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita3e63d9e15c1ac0304080ab21c2adff7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita3e63d9e15c1ac0304080ab21c2adff7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita3e63d9e15c1ac0304080ab21c2adff7::$classMap;

        }, null, ClassLoader::class);
    }
}