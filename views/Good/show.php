<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a simple CMS for tracing goods based on thier serail or part number.">
    <meta name="author" content="Mahdi Rezaei">
    <link rel="shortcut icon" href="./public/img/YadakShop.png">
    <title>Yadak Shop</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/css/partials/search.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                    <a href="#">
                        <i class="material-icons">search</i>
                        <span>Search</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="material-icons">book</i>
                        <span>Register Goods</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="material-icons">monetization_on</i>
                        <span>Register Rates</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="material-icons">person</i>
                        <span>User Account</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="login-page">
        <section class="content-nav">
            <i class="material-icons" id="open">menu</i>
            <i class="material-icons">power_settings_new</i>
        </section>
        <section class="main-content">
            <form action="" method="post" class='search-form'>
                <input type="text" name="serial" id="serial" class="fa"
                 placeholder="... کد فنی قطعه را وارد کنید">
                <input type="checkbox" name="super" id="super">
            </form>
            <table class="search-table">
                <thead>
                    <th class="first-th fa">شماره فنی</th>
                    <th class="fa">دلار پایه</th>
                    <th class="border">+10%</th>
                    <th>40</th>
                    <th>45</th>
                    <th>50</th>
                    <th>56</th>
                    <th class="red">57</th>
                    <th>58</th>
                    <th>59</th>
                    <th class="red2">60</th>
                    <th>61</th>
                    <th>62</th>
                    <th class="Action"></th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./public/js/index.js"></script>
    <script>
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
    </script>
</body>

</html>