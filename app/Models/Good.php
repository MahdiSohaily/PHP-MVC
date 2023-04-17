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
                    <a class='link Requset' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>?</a>";
                } elseif($status == "NO-Price") {
                    $template .= "
                    <a class='link NO-Price' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>!</a>";
                } elseif ($status == "NO-Mobis") {
                    $template .= "
                    <a class='link NO-Mobis' target='_blank' href='https://yadakinfo.com/projects/price/mobis-get.php?q=".$partnumber."'>x</a>";
                }


                $template.="$partnumber</div></td>
                <td >".round($avgprice*1.1)."</td>
                <td >".round($avgprice*1.2)."</td>";

                $template.=$this->getPrice($avgprice,$rates);
                $template .="
                <td  class='Action'>
                <a class='Google' target='_blank' href='https://www.google.com/search?tbm=isch&q=$partnumber'></a>
                <a class='Save' msg='$partnumber'></a>
                <a class='PartSouq' target='_blank' href='https://partsouq.com/en/search/all?q=$partnumber'></a>
                </td>
                <td><div class='weight'>$Weight KG</div></td>
            </tr> ";

            if($status == "YES-Mobis"){
                $price = $row['mobis'];
                $price = str_replace(",","",$price);
                $avgprice = round($price*110/243.5);
                $template .= "<tr class='mobis'>
                <td class='part'> $partnumber-M</td>
                <td>".round($avgprice)."</td>
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

    public function getPrice($avgprice, $rates)
    {
        $result = '';
        if ($rates->num_rows > 0) {
            // output data of each row
            while($row = $rates->fetch_assoc()) {
                $result.="
                <td> ".round($avgprice*$row['amount']*1.2*1.2*1.3)."</td>
                ";
            }
        }

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

        $sql = "SELECT * FROM rates";
		 //check if insertion was successful
		$rates = $conn->query($sql);

        $result = '';
        if ($rates->num_rows > 0) {
            // output data of each row
            while($row = $rates->fetch_assoc()) {
                $result.="
                <td> ".round($avgprice*$row['amount']*1.25*1.3)."</td>
                ";
            }
        }

        return $result;
    }
	
	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}