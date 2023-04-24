<?php 

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class LoginController
{
    // Homepage action
	public function login(RouteCollection $routes)
	{
		if(isset($_COOKIE['login-user'])) {
			header('Location: search');
				exit;
		} else {

		$user = new User(); // user class instance for database interaction
		$message = null;
		$result = null;

		if(isset($_POST['submit'])){ // Check if form was submitted
			$email = $_POST['email']; // Get input text
			$password = $_POST['password']; // Get input text
			$result = $user->login($email, $password);

			if($result) {
				$cookie_name = 'login-user';
				$cookie_value = $result['email'];

				setcookie($cookie_name, $cookie_value, time()+(60*60*24),'/');
				header('Location: search');
				exit;
			} else {
				$message = 'Either your email or password are incorrenct!';
				require_once APP_ROOT . '/views/login.php';
			}
		} else {
			require_once APP_ROOT . '/views/login.php';
		}
	}
	}

	public function logout(RouteCollection $routes)
	{
		setcookie('login-user', '', time()-(60*60*24  +1),'/');
	}
}