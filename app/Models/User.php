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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM users WHERE email='$email'";
		$user = $conn->query($sql)->fetch_assoc();
		$password = $user['password'];

        if (count($user)> 0 && $password === $pass) {
			return $user;
          } else {
            return false;
          }
	}

	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}