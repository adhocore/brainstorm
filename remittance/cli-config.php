<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once './vendor/autoload.php';

// DB connection credentials for ORM
$creds = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'dbname' => 'remittance',
];

$em = function () use ($creds) {
    static $_em;
    if ($_em) {
        return $_em;
    }

    $isDevMode = true;
    $config = Setup::createAnnotationMetadataConfiguration(
        [__DIR__.'/src/Entity'],
        $isDevMode,
        __DIR__.'/src/Proxy',
        null,
        false
    );
    $config->setProxyNamespace('Proxy');

    return $_em = EntityManager::create($creds, $config);
};

return ConsoleRunner::createHelperSet($em());
