<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a simple CMS for tracing goods based on thier serail or part number.">
    <meta name="author" content="Mahdi Rezaei">
    <link rel="shortcut icon" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/img/YadakShop.png">
    <title>Yadak Shop</title>

    <!-- css -->
    <link rel="stylesheet" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/css/partials/search.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- js -->
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/jquery.js"></script>
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/axios.js"></script>

    <style>
    .center {
        display: inline-block;
        margin-inline: auto;
        background-color: black;
    }
    </style>
</head>

<body>
    <aside id="side">
        <div class="logo">
            <p>System Menu</p>
            <i class="material-icons" id="close">close</i>
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-link">
                    <a href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/search">
                        <i class="material-icons">search</i>
                        <span>Search</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/goods">
                        <i class="material-icons">book</i>
                        <span>Register Goods</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/goodslist">
                        <i class="material-icons">format_list_bulleted</i>
                        <span>Goods List</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/rates">
                        <i class="material-icons">monetization_on</i>
                        <span>Register Rates</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/rateslist">
                        <i class="material-icons">filter_list</i>
                        <span>Rates List</span>
                    </a>
                </li>
                <!-- <li class="nav-link">
                    <a href="profile">
                        <i class="material-icons">person</i>
                        <span>User Account</span>
                    </a>
                </li> -->
            </ul>
        </nav>
    </aside>
    <main class="login-page">
        <section class="content-nav">
            <i class="material-icons" id="open">menu</i>
            <i class="material-icons" id="out">power_settings_new</i>
        </section>
        <section class="main-content">
            <div class="con-wrap">
                <?php
                    $q = $value;
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
            </div>
        </section>
    </main>
    <script>
    $(document).ready(function() {
        const side = document.getElementById('side'); /**sidebar instance */
        const open = document.getElementById('open'); /**open sidebar button instance */
        const close = document.getElementById('close'); /**close sidebar button instance */

        // Event Listeners to toggle between open and close
        open.addEventListener('click', openSidebar);
        close.addEventListener('click', closeSidebar);

        function openSidebar() {
            side.classList.add('open');
        }

        function closeSidebar() {
            side.classList.remove('open');
        }

        const out = document.getElementById('out');

        out.addEventListener('click', logout);

        function logout() {
            let text = "آیا از سیستم خارج میشوید؟";
            if (confirm(text) == true) {
                axios.get('logout').
                then(response => {
                    window.location.assign('<?php echo URL_ROOT.URL_SUBFOLDER ?>')
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    });
    </script>
</body>

</html>