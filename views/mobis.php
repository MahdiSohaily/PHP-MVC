<html>

<head>
    <link rel='stylesheet' href='style.css' type='text/css' media='all' />
</head>

<body>
    <?php
$q = $value;
echo $q;
$con = mysqli_connect('localhost','root','','yadakinfo_price');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM Nisha WHERE partnumber LIKE '".$q."%'";
$result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_assoc($result)) {
            $mobis = $row['mobis'];
    
            include_once('simple_html_dom.php');

            $context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));

            function get_http_response_code($url) {
                ini_set('user_agent', 'Mozilla/5.0');
                $headers = get_headers($url);
                return substr($headers[0], 9, 3);
            }
            
            if(get_http_response_code("https://partsmotors.com/products/$q") != "200"){
                echo "این قطعه موبیز ندارد";
                $sql="UPDATE Nisha SET mobis='-' WHERE partnumber='$q'";
                $result = mysqli_query($con,$sql);
            }
            else{
                $html = file_get_contents("https://partsmotors.com/products/$q", false, $context);
                $html = str_get_html($html);
                foreach($html->find('meta[property=og:price:amount]') as $element)
                $partnumber = $q;
                $price = $element->content;
                $price = str_replace(",","",$price);
                $avgprice = round($price*100/243.5*1.1);
                $sql="UPDATE Nisha SET mobis='$price' WHERE partnumber='$q'";
                $result = mysqli_query($con,$sql);
            }
        
    }
mysqli_close($con);     
?>
    <div class="price-table">
        <table>
            <tr>
                <th class="first-th">شماره فنی</th>
                <th>دلار پایین</th>
                <th>دلار میانگین</th>
                <th class="border">دلار بالا</th>


                <th>49</th>

                <th>50</th>
                <th>51</th>
                <th>52</th>
                <th>53</th>
                <th>54</th>
                <th>55</th>
                <th>56</th>


                <th></th>

            </tr>

        </table>
        <table id="txtHint">

            <tr class="itsmobis">
                <td class="blue">
                    <div class="empty"></div><?php echo $partnumber ?>-M
                </td>
                <td><?php echo round($avgprice/1.1) ?></td>
                <td class="gold"><?php echo round($avgprice) ?></td>
                <td class="border"><?php echo round($avgprice*1.1) ?></td>


                <td><?php echo round($avgprice*49*1.25*1.3) ?></td>

                <td><?php echo round($avgprice*50*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*51*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*52*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*53*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*54*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*55*1.25*1.3) ?></td>
                <td><?php echo round($avgprice*56*1.25*1.3) ?></td>



                <td><a class="Google" target="_blank"
                        href="https://www.google.com/search?tbm=isch&q=<?php echo $partnumber ?> Mobis"></a><a
                        class="Save" target="_blank"
                        href="https://api.telegram.org/bot1681398960:AAGykdRX-71G0PcK2X_yf3uVQOFWKVNMxoc/sendMessage?chat_id=-522041592&text=<?php echo $partnumber ?> Mobis"></a>
                </td>
            </tr>

        </table>

    </div>
</body>

</html>