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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <aside id="side">
        <div class="logo">
            <p>مینوی سیستم</p>
            <i class="material-icons" id="close">close</i>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <i class="material-icons">home</i>
                        <span>جستجوی اجناس</span>
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
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./public/js/index.js"></script>
    <script>
    const side = document.getElementById('side'); /**sidebar instance */
    const open = document.getElementById('open'); /**open sidebar button instance */
    const close = document.getElementById('close'); /**close sidebar button instance */

    open.addEventListener('click', openSidebar);
    close.addEventListener('click', closeSidebar);

    function openSidebar() {
        side.classList.add('open');
        alert('clicked')
    }

    function closeSidebar() {
        side.classList.remove('open');
        alert('clicked')
    }
    </script>
</body>

</html>