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

    public function search($key)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM Nisha WHERE partnumber LIKE '$key'";
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
                <td class='blue'>$partnumber</td>
                <td >".round($avgprice*1.1)."</td>
                <td >".round($avgprice*1.2)."</td>        
                <td >".round($avgprice*40*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*45*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*50*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*56*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*57*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*58*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*59*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*60*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*61*1.2*1.2*1.3)."</td>
                <td >".round($avgprice*62*1.2*1.2*1.3)."</td>
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
                $template .= "<tr class='itsmobis'>
                <td class='blue'><div class='empty'>
                </div> $partnumber-M</td>
                <td class='gold'>".round($avgprice)."</td>
                <td class='border'>".round($avgprice*1.1)."</td>
                <td > ".round($avgprice*40*1.25*1.3)."</td>
                <td> ".round($avgprice*45*1.25*1.3)."</td>
                <td> ".round($avgprice*50*1.25*1.3)."</td>
                <td> ".round($avgprice*56*1.25*1.3)."</td>
                <td> ".round($avgprice*57*1.25*1.3)."</td>
                <td> ".round($avgprice*58*1.25*1.3)."</td>
                <td> ".round($avgprice*59*1.25*1.3)."</td>
                <td> ".round($avgprice*60*1.25*1.3)."</td>
                <td> ".round($avgprice*61*1.25*1.3)."</td>
                <td>". round($avgprice*62*1.25*1.3)."</td>
                <td  class='Action'></td>
                <td></td>
            </tr>";
            }

            echo $template;
            }
        } else {
            echo '<div id="error">کد فنی اشتباه یا ناقص می باشد</div>';
        }
          
        $conn->close();
    }
	
	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}