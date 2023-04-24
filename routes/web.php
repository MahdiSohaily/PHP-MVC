<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();

$routes->add('login', 
    new Route(constant('URL_SUBFOLDER') . '/', 
    array('controller' => 'LoginController', 
    'method'=>'login'), array())
);

$routes->add('logout', 
    new Route(constant('URL_SUBFOLDER') . '/logout', 
    array('controller' => 'LoginController', 
    'method'=>'logout'), array())
);

$routes->add('homepage', 
    new Route(constant('URL_SUBFOLDER') . '/search', 
    array('controller' => 'PageController', 
    'method'=>'index'), array())
);

$routes->add('goods',
    new Route(constant('URL_SUBFOLDER') . '/goods',
    array('controller' => 'GoodController',
    'method'=>'index'), array())
);

$routes->add('goodslist',
    new Route(constant('URL_SUBFOLDER') . '/goodslist',
    array('controller' => 'GoodController',
    'method'=>'list'), array())
);

$routes->add('getpage',
    new Route(constant('URL_SUBFOLDER') . '/getpage/{index}/{pat}',
    array('controller' => 'GoodController',
    'method'=>'page'), array('index' => '[0-9]+', 'pat'=> '[a-zA-Z0-9]+'))
);

$routes->add('editgood',
    new Route(constant('URL_SUBFOLDER') . '/editgood/{id}',
    array('controller' => 'GoodController',
    'method'=>'edit'), array('id' => '[0-9]+'))
);

$routes->add('removegood',
    new Route(constant('URL_SUBFOLDER') . '/removegood/{id}',
    array('controller' => 'GoodController',
    'method'=>'delete'), array('id' => '[0-9]+'))
);


$routes->add('rates',
    new Route(constant('URL_SUBFOLDER') . '/rates',
    array('controller' => 'RateController',
    'method'=>'index'), array())
);

$routes->add('rateslist',
    new Route(constant('URL_SUBFOLDER') . '/rateslist',
    array('controller' => 'RateController',
    'method'=>'list'), array())
);

$routes->add('editrate',
    new Route(constant('URL_SUBFOLDER') . '/editrate/{id}',
    array('controller' => 'RateController',
    'method'=>'edit'), array('id' => '[0-9]+'))
);

$routes->add('removereat',
    new Route(constant('URL_SUBFOLDER') . '/removereat/{id}',
    array('controller' => 'RateController',
    'method'=>'delete'), array('id' => '[0-9]+'))
);

$routes->add('product',
    new Route(constant('URL_SUBFOLDER') . '/product/{id}',
    array('controller' => 'ProductController',
    'method'=>'showAction'), array('id' => '[0-9]+'))
);

$routes->add('getdata',
    new Route(constant('URL_SUBFOLDER') .'/getdata/{key}/{mode}',
    array('controller' => 'SearchController', 'method'=>'index'),
    array('key' => '[a-zA-Z0-9]+','mode'=>'[0-1]'))
);

$routes->add('searchGood',
    new Route(constant('URL_SUBFOLDER') .'/searchGood/{value}',
    array('controller' => 'SearchController', 'method'=>'search'),
    array('value' => '[a-zA-Z0-9]+'))
);

$routes->add('mobis',
    new Route(constant('URL_SUBFOLDER') .'/mobis/{value}',
    array('controller' => 'SearchController', 'method'=>'mobis'),
    array('value' => '[a-zA-Z0-9]+'))
);