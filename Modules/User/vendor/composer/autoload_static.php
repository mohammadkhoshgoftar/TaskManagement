<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d56beacc8d687855c8a76e3430427b7
{
    public static $prefixLengthsPsr4 = array (
        'M' =>
        array (
            'Modules\\User\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\User\\' =>
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\User\\Database\\Seeders\\UserDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/UserDatabaseSeeder.php',
        'Modules\\User\\Http\\Controllers\\UserController' => __DIR__ . '/../..' . '/Http/Controllers/UserController.php',
        'Modules\\User\\Http\\Controllers\\admin\\UserController' => __DIR__ . '/../..' . '/Http/Controllers/admin/UserController.php',
        'Modules\\User\\Http\\Requests\\StoreUserRequest' => __DIR__ . '/../..' . '/Http/Requests/Admin/StoreUserRequest.php',
        'Modules\\User\\Http\\Requests\\UpdateUserRequest' => __DIR__ . '/../..' . '/Http/Requests/Admin/UpdateUserRequest.php',
        'Modules\\User\\Http\\Resources\\UserCollection' => __DIR__ . '/../..' . '/Http/Resources/UserCollection.php',
        'Modules\\User\\Http\\Resources\\UserResource' => __DIR__ . '/../..' . '/Http/Resources/UserResource.php',
        'Modules\\User\\Interface\\UserRepositoryInterface' => __DIR__ . '/../..' . '/Interface/UserRepositoryInterface.php',
        'Modules\\User\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
        'Modules\\User\\Providers\\UserServiceProvider' => __DIR__ . '/../..' . '/Providers/UserServiceProvider.php',
        'Modules\\User\\Repository\\UserRepository' => __DIR__ . '/../..' . '/Repository/UserRepository.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d56beacc8d687855c8a76e3430427b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d56beacc8d687855c8a76e3430427b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d56beacc8d687855c8a76e3430427b7::$classMap;

        }, null, ClassLoader::class);
    }
}
