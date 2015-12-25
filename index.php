<?php
    require_once("static/Connection.php");
    $connection = Connection::getInstance();
    $connection->connect();

    $action = $_POST['action'];

    if(isset($action)) {
        require_once("modules/client_functions.php");

        switch($action) {
            case 'saverequest': {
                require_once("model/Request.php");
                $game = $_POST['game'];
                $money = $_POST['money'];
                $adena = $_POST['adena'];
                $server = $_POST['server'];
                $nickname = $_POST['nickname'];
                $contact = $_POST['contact'];
                $comment = $_POST['comment'];

                $link = $connection->getLink();

                $request = new Request($game, $server, $money, $adena,
                    $nickname, $contact, $comment, $link);

                saveRequest($link, $request);
                echo json_encode($link);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Some site</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,900,700,100&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div class="content">
        <header>
            <div class="logo">Logo</div>
            <h1 class="site-name">Site name</h1>
            <nav>
                <ul class="main-menu">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Гарантии</a></li>
                    <li><a href="#">Поставщикам</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </nav>
        </header>

        <section class="middle">
            <div class="side-menu gradient-transparent" >
                <ul class="lineage-list">
                    <li>
                        <h3>Lineage II (RUS)</h3>
                        <a href="/?game=lineage_rus">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (RUS)</h3>
                        <a href="/?game=lineage_classic_rus">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (Euro)</h3>
                        <a href="/?game=lineage_classic_euro">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage (Free)</h3>
                        <a href="/?game=lineage_free">Купить Адену</a><br/>
                        <a href="#">Купить Col</a>
                    </li>
                </ul>

                <ul class="other-games">
                    <li>
                        <h3>Dota 2</h3>
                        <a href="#">Купить Предметы</a>
                    </li>
                    <li>
                        <h3>CS : GO</h3>
                        <a href="#">Купить Предметы</a>
                    </li>
                </ul>
            </div>


            <div class="main-content gradient-transparent">
                <!-- /*CALC HERE*/ -->
                <?php include 'views/calc.php'; ?>
            </div>

            <div class="left-content gradient-transparent">
                <div class="contacts">
                    <ul>
                        <li>Skype: qweasd</li>
                        <li>Email: qweasd@gmail.com</li>
                    </ul>
                </div>
            </div>
        </section>

        <footer>
            <nav>
                <ul class="duplicate-menu">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Гарантии</a></li>
                    <li><a href="#">Поставщикам</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </nav>
            <p>All rights reserved</p>
        </footer>
    </div>

    <script src="scripts/digitsOnly.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="scripts/AdenaCalc.js"></script>
</body>
</html>