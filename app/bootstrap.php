<?php

use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$config = __DIR__ . '/config/config.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAnnotations(true);
$containerBuilder->addDefinitions($config);
$containerBuilder->addDefinitions(__DIR__ . '/config/deps.php');

$container = $containerBuilder->build();

return $container;
