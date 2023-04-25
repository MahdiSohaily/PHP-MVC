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

    th:nth-child(3),
    td:nth-child(3) {
        border-right: 2px solid black;
    }

    tr:nth-child(even):not(tr[class='mobis']) {
        background-color: rgb(241, 245, 247);
    }

    #s-result {
        position: relative;
        width: 100% !important;
        height: 30px;
    }

    #loading {
        position: absolute;
        left:50%;
        transform: translate(-50%, 0px);
        width: 400px;
        height: 300px;
        object-fit: contain;
    }

    a{
        text-decoration: none;
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
            <form action="" method="post" class='search-form'>
                <input type="hidden" name="hidden" autocomplete="false">
                <input type="text" name="serial" id="serial" class="fa" onkeyup="search(this.value)"
                    placeholder="... کد فنی قطعه را وارد کنید">
                <div class="input-controll">
                    <input type="checkbox" name="super" id="mode">
                    <label for="mode">Super Mode</label>
                </div>
            </form>
            <div class="con-wrap">
                <div class="resposive">
                    <table class="search-table">
                        <thead>
                            <th class="fa txt-white black txt-white part">شماره فنی</th>
                            <th class="fa txt-white dollar">دلار پایه</th>
                            <th class="txt-white dollar">+10%</th>
                            <?php echo $rates ?>
                            <th class="txt-white fa action">عملیات</th>
                            <th class="txt-white kg"></th>
                        </thead>
                        <tbody id="s-result">
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

    function search(val) {
        let pattern = val;
        let supermode = 0;
        const resultBox = document.getElementById('s-result')


        if (document.getElementById('mode').checked) {
            supermode = 1;
        }

        if (((pattern.length > 4) && (supermode == 1)) || ((pattern.length > 6) && (supermode == 0))) {
            resultBox.innerHTML =
                "<img id='loading' src='<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/img/loading.gif' alt=''>";
            axios.get('getdata/' + pattern + '/' + supermode)
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
        } else {
            resultBox.innerHTML = "";
        }
    }
    </script>
</body>

</html>