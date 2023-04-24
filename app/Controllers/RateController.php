<?php 

namespace App\Controllers;

use App\Models\Rate;
use Symfony\Component\Routing\RouteCollection;

class RateController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
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
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function list(RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$rate = new Rate();
			$data = $rate->allRates();
			require_once APP_ROOT . '/views/Rate/list.php';
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function delete($id, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$rate = new Rate();
			$data = $rate->delete($id);
			echo $data;
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function edit($id, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$rate = new Rate();
			$edit = $rate->find($id);
			$message = null;

			if(isset($_POST['submit'])){ // Check if form was submitted
				$id = $_POST['id'];
				$amount = $_POST['amount'];
				$status= $_POST['status'];

				$edit = $rate->update($id, $amount, $status);

				if($edit) {
					$message = 'Data edited successfuly';
				} else {
					$message = 'An Error occurred while saving data';
				}
			}

			require_once APP_ROOT . '/views/Rate/edit.php';
		} else {
			header('Location: /yadak');
			exit;
		}
	}

}