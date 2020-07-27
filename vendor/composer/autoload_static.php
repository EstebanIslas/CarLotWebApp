<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6f6f95af0cf3aa54b2a4ec21b2beb9e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6f6f95af0cf3aa54b2a4ec21b2beb9e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6f6f95af0cf3aa54b2a4ec21b2beb9e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}