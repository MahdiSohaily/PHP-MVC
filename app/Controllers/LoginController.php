<?php 

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class LoginController
{
    // Homepage action
	public function index(RouteCollection $routes)
	{
		$user = new User(); // user class instance for database interaction

		if(isset($_POST['submit'])){ // Check if form was submitted
			$email = $_POST['email']; // Get input text
			$password = $_POST['password']; // Get input text

			$user->login($email, $password);
	   }

    	require_once APP_ROOT . '/views/login.php';
	}
}