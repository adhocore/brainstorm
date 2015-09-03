<?php

require_once './vendor/autoload.php';

// DB connection credentials for ORM
$creds = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'dbname' => 'remittance',
];

$em = function () use ($creds) {
    static $_em;
    if ($_em) {
        return $_em;
    }

    $isDevMode = true;
    $cache = new \Doctrine\Common\Cache\ArrayCache();
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        [__DIR__.'/src/Entity'],
        $isDevMode,
        __DIR__.'/src/Proxy'
    );

    return $_em = \Doctrine\ORM\EntityManager::create(
        $creds,
        $config
    );
};

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em());
