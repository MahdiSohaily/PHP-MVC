<?php 
namespace App\Models;

class User
{
	protected $id;
	protected $name;
	protected $last_name;
	protected $email;
	protected $password;

    public function login($email, $password)
    {
        $user = $this->checkUser($email,$password);
        if($user) {
			return $user;
        } else {
            return false;
        }
    }
	
    
    // CRUD OPERATIONS
	public function create(array $data)
	{
		
	}
	
	public function checkUser($email, $pass)
	{
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = "SELECT * FROM users WHERE email='$email'";
		$user = $conn->query($sql)->fetch_assoc();
		

        if (count($user)> 0) {
            $password = $user['password'];
            if($password === $pass) {
                return $user;
            }
            return false;
          } else {
            return false;
          }
	}
}