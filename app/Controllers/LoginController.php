<?php 

namespace App\Controllers;
use Symfony\Component\Routing\RouteCollection;

class LoginController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
        require_once APP_ROOT . '/views/login.php';
	}
}