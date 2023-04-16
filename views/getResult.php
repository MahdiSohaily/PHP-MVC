<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yadakinfo_price";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

$sql = "SELECT * FROM Nisha WHERE partnumber LIKE '".$q."%'";


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $partnumber = $row['partnumber'];
        $price = $row['price'];
        $Weight =  round($row['weight'],2);
        $avgprice = round($price*110/243.5);
        $mobis = $row['mobis'];
        
        if($mobis=="0.00"){$status = "NO-Price";}
        elseif ($mobis=="-"){$status = "NO-Mobis";}
        elseif ($mobis==NULL){$status = "Requset";}
        else {$status = "YES-Mobis";} ?>

<tr>
    <td class="blue">
        <?php if($status == "Requset"){?><a class="Requset" target="_blank"
            href="https://yadakinfo.com/projects/price/mobis-get.php?q=<?php echo $partnumber ?>">?</a><?php } 
            if($status == "NO-Price"){?><a class="NO-Price" target="_blank"
            href="https://yadakinfo.com/projects/price/mobis-get.php?q=<?php echo $partnumber ?>">!</a><?php } 
            if($status == "NO-Mobis"){?><a class="NO-Mobis" target="_blank"
            href="https://yadakinfo.com/projects/price/mobis-get.php?q=<?php echo $partnumber ?>">X</a><?php } if($status == "YES-Mobis"){?>
        <div class="empty"></div> <?php } ?>
        <?php echo $partnumber ?></td>

    <td><?php echo round($avgprice*1.1) ?></td>
    <td class="border gold"><?php echo round($avgprice*1.2) ?></td>
    <td><?php echo round($avgprice*40*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*45*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*50*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*56*1.2*1.2*1.3) ?></td>
    <td class="gold"><?php echo round($avgprice*57*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*58*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*59*1.2*1.2*1.3) ?></td>
    <td class="gold2"><?php echo round($avgprice*60*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*61*1.2*1.2*1.3) ?></td>
    <td><?php echo round($avgprice*62*1.2*1.2*1.3) ?></td>



    <td class="Action">
        <a class="Google" target="_blank" href="https://www.google.com/search?tbm=isch&q=<?php echo $partnumber ?>"></a>
        <a class="Save" msg="<?php echo $partnumber ?>"></a>
        <a class="PartSouq" target="_blank" href="https://partsouq.com/en/search/all?q=<?php echo $partnumber ?>"></a>
    </td>
    <td>
        <div class="weight"><?php echo $Weight ?> KG</div>
    </td>
</tr>
<?php
        if($status == "YES-Mobis"){ 
            $price = $row['mobis'];
            $price = str_replace(",","",$price);
            $avgprice = round($price*110/243.5);

    ?>
<tr class="itsmobis">
    <td class="blue">
        <div class="empty"></div><?php echo $partnumber ?>-M
    </td>

    <td class="gold"><?php echo round($avgprice) ?></td>
    <td class="border"><?php echo round($avgprice*1.1) ?></td>

    <td><?php echo round($avgprice*40*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*45*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*50*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*56*1.25*1.3) ?></td>
    <td class="gold"><?php echo round($avgprice*57*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*58*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*59*1.25*1.3) ?></td>
    <td class="gold"><?php echo round($avgprice*60*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*61*1.25*1.3) ?></td>
    <td><?php echo round($avgprice*62*1.25*1.3) ?></td>
    <td class="Action"></td>
    <td></td>

</tr>
<?php }
    } // end while
}
else {
    echo '<div id="error">کد فنی اشتباه یا ناقص می باشد</div>';
}
mysqli_close($con);
?>