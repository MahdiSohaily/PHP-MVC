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

        $sql = "INSERT INTO rates (amount, status) VALUES ('$amount', '$status')";
		 //check if insertion was successful
		if ($conn->query($sql) === TRUE) {
            return true;
        } else {
        	return false;
        }
	}

	public function all()
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM rates ORDER BY amount";
		 //check if insertion was successful
		$rates = $conn->query($sql);
		$result = '';

		 
		if ($rates->num_rows > 0) {
            // output data of each row
            while($item = $rates->fetch_assoc()) {
				$result .= "<th class='txt-white ".$item['status']."'>".$item['amount']."</th>";
			}
		}
		 return $result;
	}
	
    public function all_for_mobis()
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM rates ORDER BY amount";
		 //check if insertion was successful
		$rates = $conn->query($sql);
		$result = '';

		 
		if ($rates->num_rows > 0) {
            // output data of each row
            while($item = $rates->fetch_assoc()) {
				$result .= "<th class='txt-white'>".$item['amount']."</th>";
			}
		}
		 return $result;
	}

	public function getRates()
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM rates ORDER BY amount";
		 //check if insertion was successful
		$result = $conn->query($sql);

		return $result;
	}

	public function allRates()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM rates ORDER BY amount";
		 //check if insertion was successful
		$rates = $conn->query($sql);

        $result = '';
        if ($rates->num_rows > 0) {
            // output data of each row
            while($row = $rates->fetch_assoc()) {
                $result.="
                <tr>
                    <td>".$row['amount']."</td>
                    <td>".$row['status']."</td>
                    <td>
                    <i class='delete material-icons' data-delete='".$row['id']."' 
                        onclick='myfun(".$row['id'].")'>
                    delete</i>
                    <a class='edit' href='editrate/".$row['id']."'>
                    <i class='material-icons'>create</i>
                    </a>
                    </td>
                </tr>
                ";
            }
        } else {
            $result .= "<tr><td colspan='3'>Nothing to show</td></tr>";
        }
        $conn->close();
        return $result."<script>
        function myfun(id){
            const resultBox = document.getElementById("."'resultbox'".");

            let text = "."'آبا مطمئن هستید که میخواهید اطلاعات مورد نظر را حذف نمائید؟'".";
            if (confirm(text) == true) {
                axios.get("."'removereat/'"." + id)
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
            }
        }
        </script>";   
    }
	
    public function find(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM rates WHERE id = '$id'";
		 //check if insertion was successful
		$rate = $conn->query($sql)->fetch_assoc();

        return $rate;
    }

	public function update(int $id, $amount, $status)
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "UPDATE rates SET amount='$amount', status='$status' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
           return $this->find($id);
        } else {
            return false;
        }
	}
	
	public function delete(int $id)
	{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

		// sql to delete a record
        $sql = "DELETE FROM rates WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            return $this->allRates();
        } else {
            return "Error deleting record: " . $conn->error;
        }
        $conn->close();
	}
}