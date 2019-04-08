<?php

include __DIR__.'/../vendor/autoload.php';

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

$collector = new RouteCollector();

$collector->group(['prefix' => 'admin'], function (RouteCollector $collector) {

    $collector->get('pages', function () {
        return 'page management';
    });

    $collector->get('products', function () {
        return 'product management';
    });

    $collector->get('orders', function () {
        return 'order management';
    });
});

$dispatcher = new Dispatcher($collector->getData());

echo $dispatcher->dispatch('GET', '/admin/pages'), "\n"; // page management
echo $dispatcher->dispatch('GET', '/admin/products'), "\n"; // product management
echo $dispatcher->dispatch('GET', '/admin/orders'), "\n"; // order management
