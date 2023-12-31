<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit527df4b6ad9e037ddee2dd2df8d944b9
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit527df4b6ad9e037ddee2dd2df8d944b9', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit527df4b6ad9e037ddee2dd2df8d944b9', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit527df4b6ad9e037ddee2dd2df8d944b9::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
