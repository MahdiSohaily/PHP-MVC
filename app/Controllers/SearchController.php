<?php 

namespace App\Controllers;
use App\Models\Good;
use App\Models\Rate;
use Symfony\Component\Routing\RouteCollection;

class SearchController
{
    // Homepage action
	public function index($key,$mode, RouteCollection $routes)
	{
		$good = new Good();
		$rate = new Rate();

		$rates->getRates();

		foreach($)

		$result = $good->search($key, $mode, $rates);
	}
}