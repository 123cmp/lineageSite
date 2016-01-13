<?php

require_once("modules/client_functions.php");
$connection = new Connection();
$connection->connect();
$link = $connection->getLink();

$items = getCsItems($link);

?>

<p>Для покупки ценностей в CS:GO вам необходимо обратится к нашим <a href="/contacts">консультантом</a>.</p>
<p>Доставка предметов CS:GO осуществляется до 30 минут, если Steam функционирует в штатном режиме.</p>
<p>Все цены на предметы указанны ниже, если вы не нашли необходимый предмет в списке вы всегда можете уточнить цену
    у нашего <a href="/contacts">консультанта</a>.</p>

<table class="game-table">
    <thead>
        <tr>
            <th>Предмет</th>
            <th>Стоимость</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($items as $i => $item) { ?>
        <tr>
            <td><?php echo $item['name']?></td>
            <td><?php echo $item['cost']?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>