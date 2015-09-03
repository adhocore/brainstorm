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

    // Register annot
    \Doctrine\Common\Annotations\AnnotationRegistry::registerFile(
        './vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
    );

    $cache = new \Doctrine\Common\Cache\ArrayCache();
    $cachedAnnotationReader = new \Doctrine\Common\Annotations\CachedReader(
        new \Doctrine\Common\Annotations\AnnotationReader(),
        $cache
    );
    $annotationDriver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        $cachedAnnotationReader,
        ['./src/Entity/']
    );

    $driverChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
    $driverChain->addDriver($annotationDriver, 'Entity');

    $config = new \Doctrine\ORM\Configuration();
    $config->setProxyDir('./src/Proxy');
    $config->setProxyNamespace('Proxy');
    // $config->setAutoGenerateProxyClasses(true);
    $config->setMetadataDriverImpl($driverChain);
    $config->setMetadataCacheImpl($cache);
    $config->setQueryCacheImpl($cache);

    return $_em = \Doctrine\ORM\EntityManager::create(
        $creds,
        $config,
        new \Doctrine\Common\EventManager()
    );
};

return new \Symfony\Component\Console\Helper\HelperSet([
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em()->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em()),
]);
