<?php 

namespace App\Controllers;

use App\Models\Rate;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		$rate = new Rate();
		$rates = $rate->all();
        require_once APP_ROOT . '/views/home.php';
	}
}