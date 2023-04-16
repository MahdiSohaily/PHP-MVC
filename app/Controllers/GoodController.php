<?php 

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class GoodController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
        require_once APP_ROOT . '/views/Good/show.php';
	}
}