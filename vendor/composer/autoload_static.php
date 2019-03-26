<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa2c09c38095ff910ce5dea3f79d92ac
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfa2c09c38095ff910ce5dea3f79d92ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfa2c09c38095ff910ce5dea3f79d92ac::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}