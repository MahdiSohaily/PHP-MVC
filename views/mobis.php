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

    <style>
    .center {
        display: inline-block;
        margin-inline: auto;
        background-color: black;
    }

    th:nth-child(4),
    td:nth-child(4) {
        border-right: 2px solid black;
    }

    a {
        text-decoration: none;
         !important;
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
                <div class="resposive">
                    <table class="search-table">
                        <thead>
                            <th class="fa txt-white black txt-white part">شماره فنی</th>
                            <th class="fa txt-white dollar">دلار پایین</th>
                            <th class="fa txt-white dollar">دلار میانگین</th>
                            <th class="fa txt-white dollar">دلار بالا</th>
                            <?php echo $rates ?>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php echo $item ?>
                        </tbody>
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