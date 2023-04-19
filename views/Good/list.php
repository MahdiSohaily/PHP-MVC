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
    <link rel="stylesheet" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/css/partials/list.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

    <!-- js -->
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/jquery.js"></script>
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/axios.js"></script>

    <style>
    table {
        margin-block: 1rem;
    }

    th {
        padding-block: 0.5rem;
        background-color: seagreen;
    }

    td {
        padding-block: 0.5rem;
        text-align: center;
    }

    #serial {
        padding: 0.5rem 1rem;
        width: 300px;
        text-align: center;
    }

    .message {
        color: green !important;
        font-size: 16px !important;
    }

    .delete {
        color: rgb(161, 19, 19) !important;
        ;
        padding-inline: 0.5rem;
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 0.2rem;
        padding: 0.2rem;
    }

    .edit i {
        color: rgb(93, 95, 194) !important;
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 0.2rem;
        padding: 0.2rem;
    }

    .page {
        display: flex;
    }

    .page-item {
        width: 15px;
        height: 15px;
        padding: 0.5rem;
        margin: 0.2rem;
        border-radius: 0.3rem;
        background-color: brown;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .hidden {
        visibility: hidden;
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

            <div id="wrapper">
                <form action="" method="post" class='search-form'>
                    <input type="text" name="serial" id="serial" class="fa" placeholder="... کد فنی قطعه را وارد کنید">
                </form>
                <table id='count' data-count='<?php echo $pages ?>'>
                    <thead>
                        <th>Part Number</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Mobis</th>
                        <th>
                            Operation
                        </th>
                    </thead>
                    <tbody id="resultbox">
                        <?php echo $data ?>
                    </tbody>
                </table>

                <ul class='page'>
                    <li id="prev" class="page-item look hidden" data-page="prev">
                        <i class="material-icons">fast_rewind</i>
                    </li>
                    <li id="next" class="page-item look">
                        <i class="material-icons" data-page="next">fast_forward</i>
                    </li>
                </ul>
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

        const total = $('#count').attr('data-count');
        const pages = Math.ceil(Number(total) / 10);

        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let current = 0;


        $('#serial').on('keyup', function(e) {
            current = 0;
            const value = e.target.value;
            const resultBox = document.getElementById('resultbox')

            if (value.length > 0) {
                axios.get('searchGood/' + value)
                    .then(response => {
                        resultBox.innerHTML = response.data;
                    }).catch(error => {
                        console.log(error);
                    })
            }
        });

        $('.look').on('click', function(e) {
            const clicked = e.target.getAttribute('data-page');
            let pattern = $('#serial').val();
            if (pattern == '') {
                pattern = null;
            }
            switch (clicked) {
                case null:
                    current--;
                    if (current < 1) {
                        prev.classList.add('hidden');
                        next.classList.remove('hidden');
                    }
                    getPage(current, pattern);
                    break;
                case 'next':
                    current++;
                    if (current > pages) {
                        next.classList.add('hidden');
                    } else {
                        prev.classList.remove('hidden');
                    }
                    getPage(current, pattern);
                    break;
            }
        });

        function getPage(index = 0, pattern) {
            const resultBox = document.getElementById('resultbox');
            axios.get('getpage/' + index+'/'+pattern)
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
        }

    });
    </script>
</body>

</html>