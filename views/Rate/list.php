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
    <link rel="stylesheet" href="./public/css/partials/list.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
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
                    <a href="search">
                        <i class="material-icons">search</i>
                        <span>Search</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="goods">
                        <i class="material-icons">book</i>
                        <span>Register Goods</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="goodslist">
                        <i class="material-icons">format_list_bulleted</i>
                        <span>Goods List</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="rates">
                        <i class="material-icons">monetization_on</i>
                        <span>Register Rates</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="rates">
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
            <i class="material-icons">power_settings_new</i>
        </section>
        <section class="main-content">

            <div id="wrapper">
            <table >
                <thead>
                    <th>Pate</th>
                    <th>status</th>
                    <th>
                        operation
                    </th>
                </thead>
                <tbody id="resultbox">
                    <?php echo $data ?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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

    $('input').on('focusin', function() {
        $(this).parent().find('label').addClass('active');
    });

    $('input').on('focusout', function() {
        if (!this.value) {
            $(this).parent().find('label').removeClass('active');
        }
    });
    $(document).ready(function() {
        $('.delete').on('click',function(e){
            const id = e.target.getAttribute('data-delete');
            const resultBox = document.getElementById('resultbox')

            axios.get('removegood/' + id )
                .then(response => {
                    resultBox.innerHTML = response.data;
                }).catch(error => {
                    console.log(error);
                })
        })
    })
    </script>
</body>

</html>