<?php 
namespace App\Models;

class Good
{
	protected $id;
	protected $partnumber;
	protected $price;
	protected $weight;
	protected $mobis;

    public function __construct(Type $var = null) {
       
    }

    // CRUD OPERATIONS
	public function create($partnumber, $price, $weight, $mobis)
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "INSERT INTO nisha (partnumber, price, weight, mobis) 
                VALUES ('$partnumber', '$price', '$weight', '$mobis')";

		if ($conn->query($sql) === TRUE) {
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