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
		$message = null;
		$result = null;

		if(isset($_POST['submit'])){ // Check if form was submitted
			$email = $_POST['email']; // Get input text
			$password = $_POST['password']; // Get input text
			$result = $user->login($email, $password);

			if($result) {
				require_once APP_ROOT . '/views/home.php';
			} else {
				$message = 'Either your email or password are incorrenct!';
				require_once APP_ROOT . '/views/login.php';
			}
		} else {
			require_once APP_ROOT . '/views/login.php';
		}
	}
}