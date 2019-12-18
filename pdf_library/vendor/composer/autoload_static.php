<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca2f08c02d210a3002444247051b0ba7
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'K' => 
        array (
            'Knp\\Snappy\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Knp\\Snappy\\' => 
        array (
            0 => __DIR__ . '/..' . '/knplabs/knp-snappy/src/Knp/Snappy',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca2f08c02d210a3002444247051b0ba7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca2f08c02d210a3002444247051b0ba7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}