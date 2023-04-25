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
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();
			$rate = new Rate();

			$rates = $rate->getRates();

			$result = $good->search($key, $mode, $rates);
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function search($value, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();

			$result = $good->searchGood($value);
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function mobis($value, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$rate = new Rate();
			$rates = $rate->all_for_mobis();
			$all_rates = $rate->getRates();

			$good = new Good();
			$item = $good->findWithSerial($value,$all_rates);

			require_once APP_ROOT . '/views/mobis.php';
		} else {
			header('Location: /yadak');
			exit;
		}
	}
}