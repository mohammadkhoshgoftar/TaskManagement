<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Modules\\User\\Database\\Seeders\\UserDatabaseSeeder' => $baseDir . '/Database/Seeders/UserDatabaseSeeder.php',
    'Modules\\User\\Http\\Controllers\\UserController' => $baseDir . '/Http/Controllers/UserController.php',
    'Modules\\User\\Http\\Controllers\\admin\\UserController' => $baseDir . '/Http/Controllers/admin/UserController.php',
    'Modules\\User\\Http\\Requests\\Admin\\StoreUserRequest' => $baseDir . '/Http/Requests/Admin/StoreUserRequest.php',
    'Modules\\User\\Http\\Requests\\Admin\\UpdateUserRequest' => $baseDir . '/Http/Requests/Admin/UpdateUserRequest.php',
    'Modules\\User\\Http\\Resources\\UserCollection' => $baseDir . '/Http/Resources/UserCollection.php',
    'Modules\\User\\Http\\Resources\\UserResource' => $baseDir . '/Http/Resources/UserResource.php',
    'Modules\\User\\Interface\\UserRepositoryInterface' => $baseDir . '/Interface/UserRepositoryInterface.php',
    'Modules\\User\\Providers\\RouteServiceProvider' => $baseDir . '/Providers/RouteServiceProvider.php',
    'Modules\\User\\Providers\\UserServiceProvider' => $baseDir . '/Providers/UserServiceProvider.php',
    'Modules\\User\\Repository\\UserRepository' => $baseDir . '/Repository/UserRepository.php',
);
