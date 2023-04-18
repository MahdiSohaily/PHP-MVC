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
    <link rel="stylesheet" href="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/css/partials/login.css">

    <!-- js -->
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/jquery.js"></script>
    <script src="<?php echo URL_ROOT.URL_SUBFOLDER ?>/public/js/axios.js"></script>

    <style>
    .warning {
        margin-bottom: 0.5rem;
        color: red;
    }
    </style>
</head>

<body>
    <main class="login-page">
        <section class="form">
            <form method="post" action class="login-form" autocomplete="off">
                <input name="email" type="text" placeholder="Email" required />
                <input name="password" type="password" placeholder="Password" required />
                <?php echo "<small class='warning'>$message</small>" ?>
                <input type="submit" name="submit">
            </form>
        </section>
    </main>
</body>

</html>