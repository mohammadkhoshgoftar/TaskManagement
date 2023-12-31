<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6921252bf81b18d4cbddd5c825bda08d
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

        spl_autoload_register(array('ComposerAutoloaderInit6921252bf81b18d4cbddd5c825bda08d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6921252bf81b18d4cbddd5c825bda08d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6921252bf81b18d4cbddd5c825bda08d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
