<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('login', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'LoginController', 'method'=>'index'), array()));
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/search', array('controller' => 'PageController', 'method'=>'index'), array()));
$routes->add('goods', new Route(constant('URL_SUBFOLDER') . '/goods', array('controller' => 'GoodController', 'method'=>'index'), array()));
$routes->add('rates', new Route(constant('URL_SUBFOLDER') . '/rates', array('controller' => 'RateController', 'method'=>'index'), array()));
$routes->add('product', new Route(constant('URL_SUBFOLDER') . '/product/{id}', array('controller' => 'ProductController', 'method'=>'showAction'), array('id' => '[0-9]+')));

$routes->add('getdata', new Route(constant('URL_SUBFOLDER') . '/getdata/{key}', array('controller' => 'SearchController', 'method'=>'index'), array('key' => '[a-zA-Z0-9]+')));
