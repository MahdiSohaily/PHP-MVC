<?php 

namespace App\Controllers;
use App\Models\Good;
use Symfony\Component\Routing\RouteCollection;

class SearchController
{
    // Homepage action
	public function index($key,$mode, RouteCollection $routes)
	{
		$good = new Good();
		$result = $good->search($key, $mode);
	}
}