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
    <link rel="stylesheet" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/css/partials/good.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

    <!-- js -->
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/jquery.js"></script>
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/axios.js"></script>
</head>
<style>
.message {
    color: green !important;
    font-size: 16px !important;
}
</style>

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

            <div id="wrapper">

                <div id="subscribeBox">
                    <h2><span class="thin">Edit</span> Rate</h2>
                    <p>Please fill out the following information inorder to Edit the specified rate.</p>

                    <!-- Start Here: Web Form tutorial -->
                    <form class="subscribeForm" method="post" action="#">
                        <input id="id" value="<?php echo $edit['id'] ?>" type="text" name="id" required hidden>
                        <input id="rate" value="<?php echo $edit['amount'] ?>" type="text" placeholder="Rate*" name="amount" required>
                        <select id="status" name="status" required>
                            <option <?php if($edit['status'] =='A') echo 'selected' ?> value="A">A</option>
                            <option <?php if($edit['status'] =='B') echo 'selected' ?> value="B">B</option>
                            <option <?php if($edit['status'] =='C') echo 'selected' ?> value="C">C</option>
                            <option <?php if($edit['status'] =='D') echo 'selected' ?> value="D">D</option>
                            <option <?php if($edit['status'] =='E') echo 'selected' ?> value="E">E</option>
                            <option <?php if($edit['status'] =='F') echo 'selected' ?> value="F">F</option>
                            <option <?php if($edit['status'] =='G') echo 'selected' ?> value="G">G</option>
                            <option <?php if($edit['status'] =='N') echo 'selected' ?> value="N">N</option>
                        </select>
                        <?php echo "<p class='message'>$message</p>" ?>
                        <input id="submit" type="submit" value="Submit" name="submit">
                    </form>

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

        $('input').on('focusin', function() {
            $(this).parent().find('label').addClass('active');
        });

        $('input').on('focusout', function() {
            if (!this.value) {
                $(this).parent().find('label').removeClass('active');
            }
        });

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