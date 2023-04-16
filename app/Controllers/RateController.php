<?php 

namespace App\Controllers;

use App\Models\Rate;
use Symfony\Component\Routing\RouteCollection;

class RateController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		$rate = new Rate();

		$message = null;

		if(isset($_POST['submit'])){ // Check if form was submitted
			$amount = $_POST['rate'];
			$status = $_POST['status'];

			$result = $rate->create($amount, $status);

			if($result) {
				$message = 'Data saved successfuly';
			} else {
				$message = 'An Error occurred while saving data';
			}
		}

        require_once APP_ROOT . '/views/Rate/show.php';
	}
}