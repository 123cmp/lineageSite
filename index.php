<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Some site</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="scripts/AdenaCalc.js"></script>
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
            <div class="side-menu">
                <ul class="server-list">
                    <li>
                        <h3>Lineage II (RUS)</h3>
                        <a href="#">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (RUS)</h3>
                        <a href="#">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage II Classic (Euro)</h3>
                        <a href="#">Купить Адену</a>
                    </li>
                    <li>
                        <h3>Lineage (Free)</h3>
                        <a href="#">Купить Адену</a>
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


            <div class="main-content">
                <!-- /*CALC HERE*/ -->
                <?php
                    include('views/calc.php');
                ?>

            </div>

            <div class="left-content">
                <div class="contacts">
                    <h2>Contacts</h2>
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

</body>
</html>