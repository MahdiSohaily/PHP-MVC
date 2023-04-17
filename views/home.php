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
<style>
.weight {
    background-color: rgb(231, 98, 98);
    display: inline-block;
    font-size: 12px;
    padding: 0.5rem;
    border-radius: 0.5rem;
    color: white;
}

.input-controll {
    display:flex;
    justify-content: center;
}

.input-controll label {
    padding-inline: 0.5rem;
}

.mobis {
    background-color: rgb(107, 106, 106);
    color: white;
}

.google,
.telegram,
.part {
    width: 30px;
    height: 30px;
    margin-inline: 0.3rem;
}

.google {
    background-image: url('../public/img/google.png');
}

.telegram {}

.part {}

#error {
    text-align: center;
    background-color: rgb(107, 106, 106);
    color: white;
    font-family: Vazir, sans-serif !important;
}

th {
    color: white;
}

.A {
    background-color: red;
}

.B {
    background-color: brown;
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
                    <a href="goods">
                        <i class="material-icons">book</i>
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
                        <i class="material-icons">monetization_on</i>
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
            <form action="" method="post" class='search-form'>
                <input type="text" name="serial" id="serial" class="fa" onkeyup="search(this.value)"
                    placeholder="... کد فنی قطعه را وارد کنید">
                <div class="input-controll">
                <input type="checkbox" name="super" id="mode">
                <label for="mode">Super Mode</label>
                </div>
            </form>
            <div class="resposive">
                <table class="search-table">
                    <thead>
                        <th class="fa txt-white black txt-white">شماره فنی</th>
                        <th class="fa txt-white">دلار پایه</th>
                        <th class="txt-white">+10%</th>
                        <?php echo $rates ?>
                        <th class="txt-white fa">عملیات</th>
                        <th class="txt-white"></th>
                    </thead>
                    <tbody id="s-result">
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./public/js/index.js"></script>
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

    function search(val) {
        let pattern = val;
        let supermode = 0;
        const resultBox = document.getElementById('s-result')


        if (document.getElementById('mode').checked) {
            supermode = 1;
        }

        if (pattern.length > 4) {
            resultBox.innerHTML = "";
            axios.get('getdata/' + pattern +'/'+supermode)
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