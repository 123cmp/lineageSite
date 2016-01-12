<?php
    require_once("static/Connection.php");
    require_once("modules/Paginator.php");
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
                $col = $_POST['col'];
                $nickname = $_POST['nickname'];
                $contact = $_POST['contact'];
                $comment = $_POST['comment'];

                $link = $connection->getLink();

                $request = new Request($game, $server, $col, $money, $adena,
                    $nickname, $contact, $comment, $link);

                if($request->isValid()) {
                    echo "OK";
                    saveRequest($link, $request);
                    die();
                } else {
                    echo "ERROR";
                    die();
                }


            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luxory-trade.ru</title>
    <link rel="shortcut icon" href="Favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,900,700,100&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/bower_components/notific8/dist/jquery.notific8.min.css" rel="stylesheet" />

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="bg2">

</div>
    <div class="content">
        <header>
<!--            <div class="logo">Logo</div>-->
            <a href="/main"><h1 class="site-name">Luxory-<span>trade</span>.ru</h1></a>
            <nav>
                <ul class="main-menu">
                    <li><a href="/main">Главная</a></li>
                    <li><a href="/guarantee">Гарантии</a></li>
                    <li><a href="/importers">Поставщикам</a></li>
                    <li><a href="/reviews">Отзывы</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </nav>
        </header>

        <section class="middle">
            <div class="side-menu gradient-transparent" >
                <ul class="lineage-list">
                    <li>
                        <h3>Lineage II (RUS)</h3>
                        <a href="/game/lineage_rus">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (RUS)</h3>
                        <a href="/game/lineage_classic_rus">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (Euro)</h3>
                        <a href="/game/lineage_classic_euro">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage (Free)</h3>
                        <a href="/game/lineage_free">Купить Адену</a><br/>
                        <a href="/game/lineage_free/col">Купить COL</a>
                    </li>
                    <li>
                        <h3>Lineage II</h3>
                        <a href="/rework">Купить ПО</a><br/>
                    </li>

                </ul>

                <ul class="other-games">
                    <li>
                        <h3>Dota 2</h3>
                        <a href="/rework">Купить Предметы</a>
                    </li>
                    <li>
                        <h3>CS : GO</h3>
                        <a href="/rework">Купить Предметы</a>
                    </li>
                </ul>
            </div>


            <div class="main-content gradient-transparent">
                <!-- /*CALC HERE*/ -->
                <?php
                $col = $_GET['col'];
                $game = $_GET['game'];
                $page = $_GET['page'];

                if(isset($game)) {
                    if($col == 'true') {
                        include 'views/colCalc.php';
                    } else {
                        include 'views/calc.php';
                    }
                    echo "<br/>Покупка и продажа игровой валюты запрещена правилами и лицензионными соглашениями. Покупая, вы полностью берете на себя ответственность за безопасность вашего персонажа/аккаунта.";
                } else {
                    if(isset($page)) {
                        include getPage($page);
                    } else {
                        include 'views/main.php';
                    }
                }
                ?>



            </div>

            <div class="left-content gradient-transparent">
                <div class="contacts">
                    <ul>
                        <li>Skype: Luxory-Trade</li>
                        <li>ISQ: 691610986</li>
                        <li>@-mail: admin@luxory-trade.ru</li>
                    </ul>
                </div>

                <div class="widget">
                    <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>

                    <!-- VK Widget -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                        resizeWidget = function() {
                            $('#vk_groups')[0].innerHTML = "";
                            VK.Widgets.Group("vk_groups", {mode: 0, width: $('.contacts').outerWidth(), height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 101423341);
                        };

                        $(window).resize(resizeWidget);
                        resizeWidget();
                    </script>
                </div>


            </div>
        </section>

        <footer>
            <nav>
                <ul class="duplicate-menu">
                    <li><a href="/main">Главная</a></li>
                    <li><a href="/guarantee">Гарантии</a></li>
                    <li><a href="/importers">Поставщикам</a></li>
                    <li><a href="/reviews">Отзывы</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </nav>
            <p>All rights reserved</p>
        </footer>
    </div>

    <script src="/scripts/digitsOnly.js"></script>
    <script src="/scripts/formatNumbers.js"></script>
    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/bower_components/notific8/dist/jquery.notific8.min.js"></script>
    <script src="/scripts/AdenaCalc.js"></script>

    <!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'RSSV6viEt9';
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
	<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>