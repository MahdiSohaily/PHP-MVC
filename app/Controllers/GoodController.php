<?php 

namespace App\Controllers;

use App\Models\Good;
use Symfony\Component\Routing\RouteCollection;

class GoodController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
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
	} else {
		header('Location: /yadak');
		exit;
	}
	}

	public function list(RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();
			$data = $good->all();
			$pages = $good->count();
			require_once APP_ROOT . '/views/Good/list.php';
		} else {
			header('Location: /yadak');
			exit;
		}
	}

	public function delete($id, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();
			$data = $good->delete($id);
			echo $data;
		} else {
			header('Location: /yadak');
			exit;
		}
	}
	
	public function page($index, $pat, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();
			$data = $good->page($index, $pat);
			echo $data;
		} else {
			header('Location: /yadak');
			exit;
		}
	}



	public function edit($id, RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			$good = new Good();
			$edit = $good->find($id);
			$message = null;

			if(isset($_POST['submit'])){ // Check if form was submitted
				$id = $_POST['id'];
				$price = $_POST['price'];
				$weight= $_POST['weight'];
				$mobis= $_POST['mobis'];

				$edit = $good->update($id, $price, $weight, $mobis);

				if($edit) {
					$message = 'Data edited successfuly';
				} else {
					$message = 'An Error occurred while saving data';
				}
			}

			require_once APP_ROOT . '/views/Good/edit.php';
		} else {
			header('Location: /yadak');
			exit;
		}
	}
}