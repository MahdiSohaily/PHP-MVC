<?php 
namespace App\Models;

class Good
{
	protected $id;
	protected $partnumber;
	protected $price;
	protected $weight;
	protected $mobis;

    // CRUD OPERATIONS
	public function create($partnumber, $price, $weight, $mobis)
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        if ($mobis) {
            $sql = "INSERT INTO nisha (partnumber, price, weight, mobis) 
            VALUES ('$partnumber', '$price', '$weight', '$mobis')";
        } else {
            $sql = "INSERT INTO nisha (partnumber, price, weight) 
                VALUES ('$partnumber', '$price', '$weight')";
        }

        //check if insertion was successful
		if ($conn->query($sql) === TRUE) {
            return true;
          } else {
            return false;
          }
          $conn->close();
	}

    public function search($key, $mode,$rates)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        if ($mode) {
            $sql="SELECT * FROM Nisha WHERE partnumber LIKE '".$key."%'";
        } else {
            $sql="SELECT * FROM Nisha WHERE partnumber LIKE '$key'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $partnumber = $row['partnumber'];
                $price = $row['price'];
                $Weight =  round($row['weight'],2);
                $avgprice = round($price*110/243.5);
                $mobis = $row['mobis'];

                if($mobis=="0.00"){$status = "NO-Price";}
                elseif ($mobis=="-"){$status = "NO-Mobis";}
                elseif ($mobis==NULL){
                    $status = "Requset";
                }
                else {$status = "YES-Mobis";}
                $template = "<tr>
                <td class='blue part'> <div class='fix'>";
                if($status == "Requset") {
                    $template .= "
                    <a class='link-s Requset' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>?</a>";
                } elseif($status == "NO-Price") {
                    $template .= "
                    <a class='link-s NO-Price' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>!</a>";
                } elseif ($status == "NO-Mobis") {
                    $template .= "
                    <a class='link-s NO-Mobis' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>x</a>";
                }


                $template.="$partnumber</div></td>
                <td >".round($avgprice*1.1)."</td>
                <td class='orange' >".round($avgprice*1.2)."</td>";

                $template.=$this->getPrice($avgprice,$rates);
                $template .="
                <td class='action'>
                    <a target='_blank' href='https://www.google.com/search?tbm=isch&q=$partnumber'>
                    <img class='social' src='./public/img/google.png' alt='google'>
                    </a>
                    <a msg='$partnumber'>
                    <img class='social' src='./public/img/tel.png' alt='part'>
                    </a>
                    <a target='_blank' href='https://partsouq.com/en/search/all?q=$partnumber'>
                    <img class='social' src='./public/img/part.png' alt='part'>
                    </a>
                </td>
                <td class='kg'>
                    <div class='weight'>$Weight KG</div>
                </td>
            </tr> ";

            if($status == "YES-Mobis"){
                $price = $row['mobis'];
                $price = str_replace(",","",$price);
                $avgprice = round($price*110/243.5);
                $template .= "<tr class='mobis'>
                <td class='part text-white'> $partnumber-M</td>
                <td class='bold'>".round($avgprice)."</td>
                <td>".round($avgprice*1.1)."</td>
                ";
                $template .= $this-> getPriceMobis($avgprice, $rates);
                $template .= "
                <td></td>
                <td></td>
            </tr>";
            }

            echo $template;
            }
        } else {
            echo '<tr id="error">
                <td colspan="15 fa">کد فنی اشتباه یا ناقص می باشد</td>
            </tr>';
        }
          
        $conn->close();
    }

    public function getPrice($avgprice)
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
                <td class='".$row['status']."'> ".round($avgprice*$row['amount']*1.2*1.2*1.3)."</td>
                ";
            }
        }
        $conn->close();
        return $result;
    }
    
    public function getPriceMobis($avgprice)
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
                <td class='b-".$row['status']."'> ".round($avgprice*$row['amount']*1.25*1.3)."</td>
                ";
            }
        }
        $conn->close();
        return $result;
    }

    public function all()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "SELECT * FROM nisha";
		 //check if insertion was successful
		$rates = $conn->query($sql);

        $result = '';
        if ($rates->num_rows > 0) {
            // output data of each row
            while($row = $rates->fetch_assoc()) {
                $result.="
                <tr>
                    <td>".$row['partnumber']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['weight']."</td>
                    <td>".$row['mobis']."</td>
                    <td>
                    <i class='delete material-icons' data-delete='".$row['id']."'
                    onclick='deletefunc(".$row['id'].")'>delete</i>
                    </td>
                </tr>
                ";
            }
        } else {
            $result .= "<tr><td colspan='5'>Nothing to show</td></tr>";
        }
        $conn->close();
        return $result."<script>
        function deletefunc(id){
            const resultBox = document.getElementById("."'resultbox'".");

            let text = "."'آبا مطمئن هستید که میخواهید اطلاعات مورد نظر را حذف نمائید؟'".";
            if (confirm(text) == true) {
                axios.get("."'removegood/'"." + id)
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
            }
        }
        </script>";   
    }

    public function searchGood($patt)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM Nisha WHERE partnumber LIKE '%".$patt."%'";
		 //check if insertion was successful
		$rates = $conn->query($sql);

        $result = '';
        if ($rates->num_rows > 0) {
            // output data of each row
            while($row = $rates->fetch_assoc()) {
                $result.="
                <tr>
                    <td>".$row['partnumber']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['weight']."</td>
                    <td>".$row['mobis']."</td>
                    <td>
                    <i class='delete material-icons' data-delete='".$row['id']."'>delete</i>
                    </td>
                </tr>
                ";
            }
        } else {
            $result .= "<tr><td colspan='5'>Nothing to show</td></tr>";
        }
        $conn->close();
        echo $result;   
    }
	
	public function update(int $id, array $data)
	{
		
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
        $sql = "DELETE FROM nisha WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            return $this->all();
        } else {
            return "Error deleting record: " . $conn->error;
        }
        $conn->close();
	}
}