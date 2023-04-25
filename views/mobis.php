<html>

<head>
    <link rel='stylesheet' href='style.css' type='text/css' media='all' />
    <style>
        body {
     
     direction: rtl;
    font-family: SDF;
    text-align: right;
}  
#txtHint-box {
      background: #3c8df3;
    border: 1px solid #ffffff;
    width: 90%;
    margin: auto;
    max-width: 300px;
    padding: 10px;
    color: #ffffff;
    -webkit-border-radius: 13px;
    border-radius: 13px;
    -webkit-box-shadow: 1px 1px 5px 1px #bedbff;
    box-shadow: 1px 1px 5px 1px #bedbff;

}
input[type="text"] {
    direction: ltr;
}
.Requset {
    background: green;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
  margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.Google {
background: url(Google.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 3px 11px;

}
.PartSouq {
    background: url(PartSouq.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 5px 12px;
    margin-left: 4px;

}
.Weight {
    background: #ffa59d;
    display: inline;
    padding: 1px 3px;
    color: #ffffff;
    -webkit-border-radius: 5px;
    position: relative;
    top: -1px;

}
.Save {
background: url(Telegram.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 4px 12px;

    margin-left: 4px;
}
.NO-Mobis {
    background: red;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
  margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.NO-Price {
    background: black;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
   margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.gold {
        background: #ffc800;
    font-weight: bold;
        font-size: 15px;
    color: black;
}
.blue {
        background: #2e51d2;
    font-weight: bold;
    color: white;
    font-size: 20px;
        width: 20%;
}
.red {
        background: red;
    
}
.red2 {
        background: #8b1010;
    
}
.gold2 {
        background: #cda100;
    font-weight: bold;
        font-size: 15px;
    color: black;
}
#error {
    font-size: 14px;
    font-weight: bold;
    color: red;
    text-shadow: white 1px 1px 1px;
}
.loading {
    
    background-image: url(loading.gif) !important;
    background-size: 27% !important;
    background-repeat: no-repeat !important;
    background-position: 95% !important;
}
#unit {
    float: left
}
#txtHint {
    
    
}
.save-code input {
    
    
padding: 0.5%;
    font-size: 20px;
}
.input-value {
    background: #ffffff;
    border: 1px solid #cacaca;
    width: 90%;
    margin: 80px auto 40px auto;
    max-width: 500px;
    padding: 16px;
    color: #000000;
    -webkit-border-radius: 13px;
    border-radius: 13px;
    display: block;
    font-size: 21px;
    text-align: center;
    font-family: 'SDF';
}
		@font-face{
	font-family:'SDF';
	src: url('/fonts/IRANSans-Light-web.woff') format('woff'),
	     url('/fonts/IRANSans-Light-web.ttf') format('truetype');
	font-weight:normal
}
@font-face{
	font-family:'SDF';
	src: url('/fonts/IRANSans-Bold-web.woff') format('woff'),
	     url('/fonts/IRANSans-Bold-web.ttf') format('truetype');
   font-weight:bold
}



.blue a {
    color: white;
    text-decoration: none;
}




.price-table table {
    direction: ltr;
    width: 90%;
    margin: auto;
}
table {
  border-collapse: collapse;
         font-size: 12px;
    color: #3c3b3b;
}
.border {
    border-right: 3px solid black;

}
.first-th {
      background: black;
          width: 20%;
}
th, td {
    text-align: center;

    width: 5%;
      height: 45px;

}
.Action {
    width: 10%;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

tr.itsmobis td, tr.itsmobis tr {
    background: #b5b3b3;
}

tr.itsmobis first-child, .blue {
       text-align: left; 
}
.empty {
    width: 30px;
    height: 30px;
    display: block;
    float: left;
    margin-left: 6px;
    margin-right: 6px;
}

.msg-loading {
    background: url(msg-loading.gif) no-repeat;
    background-size: 100%;
}

#anbarHint {
    background: #e0e0e0;
    font-size: 21px;
    padding: 2%;
    text-align: left;
margin-bottom: 70px;
}

table#anbarHint td {
    width: 25%;
}

table#anbarHint-head {
    margin-top: 50px;
}
.no-qty {
        color: red;
}

a.add-code-db {
    color: #1141a5;
    text-decoration: none;
    font-size: 43px;
    font-weight: bold;
    background: #0da8d8;
    width: 50px;
    height: 50px;
    display: block;
    text-align: center;
 
    margin: auto;
    margin-bottom: 37px;
    -webkit-border-radius: 25%;
    border: 6px solid #2057ca;
    -webkit-box-shadow: 0px 3px 2px 2px #cacaca;
    line-height: 54px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.send-input-db-save {
    color: #1141a5;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    background: #0da8d8;
    width: 82px;
    height: 54px;
    display: block;
    text-align: center;
    margin-top: -26px;
    -webkit-border-radius: 25%;
    border: 6px solid #2057ca;
    -webkit-box-shadow: 0px 3px 2px 2px #cacaca;
    line-height: 54px;
    float: left;
}

.super {
    text-align: center;
    font-size: 19px;
    color: #a1a1a1;
}





@media only screen and (max-width: 900px) {
    
    .price-table {
    overflow: scroll;
}
table {
    min-width: 1000px;
}
.table {
 
    font-size: 12px !important;
   
}
.blue {

    font-size: 15px;
}

}body {
     
     direction: rtl;
    font-family: SDF;
    text-align: right;
}  
#txtHint-box {
      background: #3c8df3;
    border: 1px solid #ffffff;
    width: 90%;
    margin: auto;
    max-width: 300px;
    padding: 10px;
    color: #ffffff;
    -webkit-border-radius: 13px;
    border-radius: 13px;
    -webkit-box-shadow: 1px 1px 5px 1px #bedbff;
    box-shadow: 1px 1px 5px 1px #bedbff;

}
input[type="text"] {
    direction: ltr;
}
.Requset {
    background: green;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
  margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.Google {
background: url(Google.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 3px 11px;

}
.PartSouq {
    background: url(PartSouq.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 5px 12px;
    margin-left: 4px;

}
.Weight {
    background: #ffa59d;
    display: inline;
    padding: 1px 3px;
    color: #ffffff;
    -webkit-border-radius: 5px;
    position: relative;
    top: -1px;

}
.Save {
background: url(Telegram.png) no-repeat;
    background-size: 100%;
    display: inline;
    padding: 4px 12px;

    margin-left: 4px;
}
.NO-Mobis {
    background: red;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
  margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.NO-Price {
    background: black;
    -webkit-border-radius: 50%;
    width: 30px;
    height: 30px;
    display: block;
    float: left;
   margin-left: 6px;
    text-align: center;
    margin-right: 6px;
}
.gold {
        background: #ffc800;
    font-weight: bold;
        font-size: 15px;
    color: black;
}
.blue {
        background: #2e51d2;
    font-weight: bold;
    color: white;
    font-size: 20px;
        width: 20%;
}
.red {
        background: red;
    
}
.red2 {
        background: #8b1010;
    
}
.gold2 {
        background: #cda100;
    font-weight: bold;
        font-size: 15px;
    color: black;
}
#error {
    font-size: 14px;
    font-weight: bold;
    color: red;
    text-shadow: white 1px 1px 1px;
}
.loading {
    
    background-image: url(loading.gif) !important;
    background-size: 27% !important;
    background-repeat: no-repeat !important;
    background-position: 95% !important;
}
#unit {
    float: left
}
#txtHint {
    
    
}
.save-code input {
    
    
padding: 0.5%;
    font-size: 20px;
}
.input-value {
    background: #ffffff;
    border: 1px solid #cacaca;
    width: 90%;
    margin: 80px auto 40px auto;
    max-width: 500px;
    padding: 16px;
    color: #000000;
    -webkit-border-radius: 13px;
    border-radius: 13px;
    display: block;
    font-size: 21px;
    text-align: center;
    font-family: 'SDF';
}
		@font-face{
	font-family:'SDF';
	src: url('/fonts/IRANSans-Light-web.woff') format('woff'),
	     url('/fonts/IRANSans-Light-web.ttf') format('truetype');
	font-weight:normal
}
@font-face{
	font-family:'SDF';
	src: url('/fonts/IRANSans-Bold-web.woff') format('woff'),
	     url('/fonts/IRANSans-Bold-web.ttf') format('truetype');
   font-weight:bold
}



.blue a {
    color: white;
    text-decoration: none;
}




.price-table table {
    direction: ltr;
    width: 90%;
    margin: auto;
}
table {
  border-collapse: collapse;
         font-size: 12px;
    color: #3c3b3b;
}
.border {
    border-right: 3px solid black;

}
.first-th {
      background: black;
          width: 20%;
}
th, td {
    text-align: center;

    width: 5%;
      height: 45px;

}
.Action {
    width: 10%;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

tr.itsmobis td, tr.itsmobis tr {
    background: #b5b3b3;
}

tr.itsmobis first-child, .blue {
       text-align: left; 
}
.empty {
    width: 30px;
    height: 30px;
    display: block;
    float: left;
    margin-left: 6px;
    margin-right: 6px;
}

.msg-loading {
    background: url(msg-loading.gif) no-repeat;
    background-size: 100%;
}

#anbarHint {
    background: #e0e0e0;
    font-size: 21px;
    padding: 2%;
    text-align: left;
margin-bottom: 70px;
}

table#anbarHint td {
    width: 25%;
}

table#anbarHint-head {
    margin-top: 50px;
}
.no-qty {
        color: red;
}

a.add-code-db {
    color: #1141a5;
    text-decoration: none;
    font-size: 43px;
    font-weight: bold;
    background: #0da8d8;
    width: 50px;
    height: 50px;
    display: block;
    text-align: center;
 
    margin: auto;
    margin-bottom: 37px;
    -webkit-border-radius: 25%;
    border: 6px solid #2057ca;
    -webkit-box-shadow: 0px 3px 2px 2px #cacaca;
    line-height: 54px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.send-input-db-save {
    color: #1141a5;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    background: #0da8d8;
    width: 82px;
    height: 54px;
    display: block;
    text-align: center;
    margin-top: -26px;
    -webkit-border-radius: 25%;
    border: 6px solid #2057ca;
    -webkit-box-shadow: 0px 3px 2px 2px #cacaca;
    line-height: 54px;
    float: left;
}

.super {
    text-align: center;
    font-size: 19px;
    color: #a1a1a1;
}





@media only screen and (max-width: 900px) {
    
    .price-table {
    overflow: scroll;
}
table {
    min-width: 1000px;
}
.table {
 
    font-size: 12px !important;
   
}
.blue {

    font-size: 15px;
}

}
    </style>
</head>

<body>
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
                <td class="gold"><?php echo ($avgprice) ?></td>
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