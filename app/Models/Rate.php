<?php 
namespace App\Models;

class Rate
{
	protected $id;
	protected $rate;
	protected $status;

    // CRUD OPERATIONS
	public function create($amount, $status)
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "INSERT INTO rates (amount, status) VALUES ($amount, $status)";
		 //check if insertion was successful
		if ($conn->query($sql) === TRUE) {
            return true;
        } else {
        	return false;
        }
	}
	
	public function checkUser($email, $pass)
	{
        
	}

	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}