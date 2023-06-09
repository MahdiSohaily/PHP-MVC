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
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = "SELECT * FROM rates ORDER BY amount";
		 //check if insertion was successful
		$result = $conn->query($sql);

		return $result;
	}

	public function allRates()
    {
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql="SELECT * FROM rates WHERE id = '$id'";
		 //check if insertion was successful
		$rate = $conn->query($sql)->fetch_assoc();

        return $rate;
    }

	public function update(int $id, $amount, $status)
	{
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = "UPDATE rates SET amount='$amount', status='$status' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
           return $this->find($id);
        } else {
            return false;
        }
	}
	
	public function delete(int $id)
	{
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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