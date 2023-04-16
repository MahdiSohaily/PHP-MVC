<?php 
namespace App\Models;

class User
{
	protected $id;
	protected $name;
	protected $last_name;
	protected $email;
	protected $password;

    public function __construct(Type $var = null) {
       
    }

    public function login($email, $password)
    {
        $user = $this->getUser($email);
        if($user) {
            $match= $this->checkPass($password, $user);
            if($match) {
                header("Location: https://mysite.com
                /members/index.php");
            } else {
                echo "didn't matched";
            }
        } else {
            return 'Either your email or password is wrong!';
        }
    }
	
    // GET METHODS
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getLast_name()
	{
		return $this->last_name;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	
    // SET METHODS
    public function setName(string $name)
	{
		$this->name = $name;
	}
	
	public function setLast_name(string $last_name)
	{
		$this->last_name = $last_name;
	}
	
	public function setEmail(string $email)
	{
		$this->email = $email;
	}
	
	public function setPassword(string $password)
	{
		$this->password = $password;
	}
	

    // CRUD OPERATIONS
	public function create(array $data)
	{
		
	}
	
	public function getUser($email)
	{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM users WHERE email='$email'";
		$user = $conn->query($sql)->fetch_assoc();

        if (count($user)> 0) {
            return $user;
          } else {
            return false;
          }
	}

    public function checkPass(string $pass, array $user)
    {
        if ($pass === $user['password']) {
            return true;
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