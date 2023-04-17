<?php 

namespace App\Controllers;

use App\Models\Good;
use Symfony\Component\Routing\RouteCollection;

class GoodController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		$good = new Good();
		$message = null;

		if(isset($_POST['submit'])){ // Check if form was submitted
			$partnumber = $_POST['pname'];
			$price = $_POST['price'];
			$weight= $_POST['weight'];
			$mobis= $_POST['mobis'];

			$result = $good->create($partnumber, $price, $weight, $mobis);

			if($result) {
				$message = 'Data saved successfuly';
			} else {
				$message = 'An Error occurred while saving data';
			}
		}

		require_once APP_ROOT . '/views/Good/show.php';
	}

	public function list(RouteCollection $routes)
	{
		require_once APP_ROOT . '/views/Good/list.php';
	}
}