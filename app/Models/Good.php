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
            $sql="SELECT * FROM nisha WHERE partnumber LIKE '".$key."%'";
        } else {
            $sql="SELECT * FROM nisha WHERE partnumber LIKE '".$key."%'";
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
                    $template .= " <a class='link-s Requset' target='_self' href='".URL_ROOT.URL_SUBFOLDER .'/mobis/'.$partnumber."'>?</a>";
                } elseif($status == "NO-Price") {
                    $template .= " <a class='link-s NO-Price' target='_self' href='".URL_ROOT.URL_SUBFOLDER .'/mobis/'.$partnumber."'>!</a>";
                } elseif ($status == "NO-Mobis") {
                    $template .= " <a class='link-s NO-Mobis' target='_self' href='".URL_ROOT.URL_SUBFOLDER .'/mobis/'.$partnumber."'>x</a>";
                }

                $template.="$partnumber</div></td>
                <td >".round($avgprice*1.1)."</td>
                <td class='orange' >".round($avgprice*1.2)."</td>";

                $template.=$this->getPrice($avgprice,$rates);
                $template .="
                <td class='action'>
                    <a target='_self' href='https://www.google.com/search?tbm=isch&q=$partnumber'>
                    <img class='social' src='./public/img/google.png' alt='google'>
                    </a>
                    <a msg='$partnumber'>
                    <img class='social' src='./public/img/tel.png' alt='part'>
                    </a>
                    <a target='_self' href='https://partsouq.com/en/search/all?q=$partnumber'>
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

    public function mobie($value,$rates)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM nisha WHERE partnumber = '$value'";
        

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $partnumber = $row['partnumber'];
                $price = $row['price'];
                $Weight =  round($row['weight'],2);
                $avgprice = round($price*110/243.5);
                $mobis = $row['mobis'];

                if($mobis == "0.00"){
                    $status = "NO-Price";
                } elseif ($mobis == "-"){
                    $status = "NO-Mobis";
                } elseif ($mobis == NULL){
                    $status = "Requset";
                }
                else {$status = "YES-Mobis";}
                $template = "<tr>
                <td class='blue part'> <div class='fix'>";
                if($status == "Requset") {
                    $template .= " <a class='link-s Requset' target='_self' href='".URL_ROOT.URL_SUBFOLDER."'/mobis/'".$partnumber."'>?</a>";
                } elseif($status == "NO-Price") {
                    $template .= " <a class='link-s NO-Price' target='_self' href='".URL_ROOT.URL_SUBFOLDER."'/mobis/'".$partnumber."'>!</a>";
                } elseif ($status == "NO-Mobis") {
                    $template .= " <a class='link-s NO-Mobis' target='_self' href='".URL_ROOT.URL_SUBFOLDER."'/mobis/'".$partnumber."'>x</a>";
                } elseif ($status == "YES-Mobis") {
                    $template .= " <div class='empty'></div>";
                }


                $template.="$partnumber</div></td>
                <td >".round($avgprice*1.1)."</td>
                <td class='orange' >".round($avgprice*1.2)."</td>";

                $template.=$this->getPrice($avgprice,$rates);
                $template .="
                <td class='action'>
                    <a target='_self' href='https://www.google.com/search?tbm=isch&q=$partnumber'>
                    <img class='social' src='". URL_ROOT.URL_SUBFOLDER ."/public/img/google.png' alt='google'>
                    </a>
                    <a msg='$partnumber'>
                    <img class='social' src='". URL_ROOT.URL_SUBFOLDER ."/public/img/tel.png' alt='part'>
                    </a>
                    <a target='_self' href='https://partsouq.com/en/search/all?q=$partnumber'>
                    <img class='social' src='". URL_ROOT.URL_SUBFOLDER ."/public/img/part.png' alt='part'>
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
                <td class='part text-white left'> $partnumber-M</td>
                <td class='bold'>".round($avgprice)."</td>
                <td>".round($avgprice*1.1)."</td>
                ";
                $template .= $this-> getPriceMobis($avgprice, $rates);
                $template .= "
                <td></td>
                <td></td>
                </tr>";
            }

            return $template;
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
    
    public function getPriceMobisPage($avgprice)
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
                <td> ".round($avgprice*$row['amount']*1.25*1.3)."</td>
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

        $sql = "SELECT * FROM nisha LIMIT 10";
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
                    <a class='edit' href='editgood/".$row['id']."'>
                    <i class='material-icons'>create</i>
                    </a>
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

            let text = "."'آیا مطمئن هستید که میخواهید اطلاعات مورد نظر را حذف نمائید؟'".";
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

    public function searchGood(string $patt)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM nisha WHERE partnumber LIKE '%".$patt."%' LIMIT 10";
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
                    <a class='edit' href='editgood/".$row['id']."'>
                    <i class='material-icons'>create</i>
                    </a>
                    </td>
                </tr>
                ";
            }
        } else {
            $result .= "<tr><td colspan='5'>Nothing to show</td></tr>";
        }
        $conn->close();
        echo $result."<script>
        function deletefunc(id){
            const resultBox = document.getElementById("."'resultbox'".");

            let text = "."'آیا مطمئن هستید که میخواهید اطلاعات مورد نظر را حذف نمائید؟'".";
            if (confirm(text) == true) {
                axios.get("."'removegood/'"." + id)
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
            }
        }
        </script>"; ;   
    }

    public function count()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT COUNT(id) as sum FROM nisha";
		$goods = $conn->query($sql)->fetch_assoc();
        return $goods['sum'];
    }

    public function find(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql="SELECT * FROM nisha WHERE id = '$id'";
		 //check if insertion was successful
		$good = $conn->query($sql)->fetch_assoc();

        return $good;
    }
    
    public function findWithSerial($serial, $rates)
    {
        $q = $serial;
        $partnumber = null;
        $avgprice = null;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $con = mysqli_connect($servername, $username, $password,$dbname);
        $sql="SELECT * FROM nisha WHERE partnumber = '$q'";
        $result = $con->query($sql);

        $template = '';
        if ($result->num_rows > 0) {

            $context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));

            function get_http_response_code($url) {
                ini_set('user_agent', 'Mozilla/5.0');
                $headers = get_headers($url);
                return substr($headers[0], 9, 3);
            }
            
            if(get_http_response_code("https://partsmotors.com/products/$q") != "200"){
                $sql="UPDATE nisha SET mobis='-' WHERE partnumber='$q'";
                $result = mysqli_query($con,$sql);
                $template .= "<tr class='mobis'><td colspan='".$rates->num_rows + 5 ."'>این قطعه موبیز ندارد</td></tr>";
            }
            else{
                require_once 'simple_html_dom.php';
                $html = file_get_contents("https://partsmotors.com/products/$q", false, $context);
                $html = str_get_html($html);
                foreach($html->find('meta[property=og:price:amount]') as $element)
                $price = $element->content;
                $partnumber = $q;
                $price = str_replace(",","",$price);
                $avgprice = round($price*100/243.5*1.1);
                $sql="UPDATE nisha SET mobis='$price' WHERE partnumber='$q'";
                $result = mysqli_query($con,$sql);
                $template .= "<tr class='mobis'>
                    <td class='part text-white bold'> $partnumber-M</td>
                    <td>".round($avgprice/1.1)."</td>
                    <td class='bold'>".round($avgprice)."</td>
                    <td>".round($avgprice*1.1)."</td>";
                    $template .= $this-> getPriceMobisPage($avgprice);
                    $template .= "<td class='action'>
                    <a target='_self' href='https://www.google.com/search?tbm=isch&q=$partnumber'>
                    <img class='social' src='".URL_ROOT.URL_SUBFOLDER."/public/img/google.png' alt='google'>
                    </a>
                    <a target='_self' href='https://api.telegram.org/bot1681398960:AAGykdRX-71G0PcK2X_yf3uVQOFWKVNMxoc/sendMessage?chat_id=-522041592&text=$partnumber Mobis'>
                    <img class='social' src='".URL_ROOT.URL_SUBFOLDER."/public/img/tel.png' alt='part'>
                    </a>
                </td></tr>"; 
            }
        }
        mysqli_close($con);     

        return $template;
    }

    public function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
	
	public function update(int $id, $price, $weight, $mobis)
	{
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        $sql = "UPDATE nisha SET price='$price', weight='$weight',mobis='$mobis' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
           return $this->find($id);
        } else {
            return false;
        }
	}

    public function page(int $index, $pat)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yadakinfo_price";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        $start = 10 * $index;
        if ($pat != 'null') {
            $sql = "SELECT * FROM nisha WHERE partnumber LIKE '%".$pat."%' LIMIT  $start,10";
        } else {
            $sql = "SELECT * FROM nisha LIMIT  $start,10";
        }
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
                    <a class='edit' href='editgood/".$row['id']."'>
                    <i class='material-icons'>create</i>
                    </a>
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

            let text = "."'آیا مطمئن هستید که میخواهید اطلاعات مورد نظر را حذف نمائید؟'".";
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