<?php

require_once('model/Coefficient.php');
require_once('model/Server.php');
require_once('modules/client_functions.php');
require_once('static/Connection.php');

$data = [];

//for($i = 0; $i < 3; $i ++) {
//    $coefficients = [
//       new Coefficient(10/($i+1), ($i+1)*1000),
//       new Coefficient(10/($i+2), ($i+2)*1000),
//       new Coefficient(10/($i+3), ($i+3)*1000),
//    ];
//    $server = new Server("server".$i, $coefficients);
//    array_push($data, $server);
//}

$game = $_GET['game'];
$connection = Connection::getInstance();
$link = $connection->getLink();

if(!isset($game))
    $game = 'lineage_classic_euro';

$coefficients = getGameCoefficients($link, $game);
$servers = getGameServers($link, $game);

foreach($servers as $i => $server) {
    $serverCoefficients = [];
    foreach($coefficients as $j => $coefficient) {
        if($coefficient["server_id"] === $server["id"])
            array_push($serverCoefficients,
                new Coefficient($coefficient["cost"], $coefficient["sum"]));
    }

    $name = $server["server_name"];
    $server = new Server($name, $serverCoefficients);
    array_push($data, $server);
}

?>

<div class="calc">
    <h2>Калькулятор</h2>
    <div class="first">
        <label>
            <select class="server">
                <?php foreach($data as $i => $server) {
                    echo "<option value='{$server->name}' data-id='{$i}'>{$server->name}</option>";
                }
                ?>
            </select>
        </label>
        <br/>
        <label>
            <input class="money" type="text" placeholder="Я заплачу">
        </label>
        <br/>
        <label>
            <input class="adena" type="text" placeholder="Я получу">
        </label>
        <br/>
        <button>Пойдет</button>
    </div>
    <div class="second" style="display: none">
        <label>
            <input class="nickname" type="text" placeholder="Ник">
        </label>
        <br/>
        <label>
            <input class="contact" type="text" placeholder="Контакт">
        </label>
        <br/>
        <label>
            <textarea class="comment" placeholder="Комментарий"></textarea>
        </label>
        <br/>
        <button>Пойдет</button>
    </div>


</div>

<script>
    var first = $('.calc .first');
    var second = $('.calc .second');
    first.find('button').click(function() {
        first.hide();
        second.show();
    });
    second.find('button').click(function() {
        $.ajax({
            url: '/',
            type: 'post',
            data: {
                action: 'saverequest',
                game: '<?php echo $game ?>',
                server: $('.server').val(),
                money: $('.money').val(),
                adena: $('.adena').val(),
                nickname: $('.nickname').val(),
                contact: $('.contact').val(),
                comment: $('.comment').val()
            },
            complete: function() {
//                window.location.reload();
            }
        })
    });
    var adenaCalc = new AdenaCalc(
        $('.money'),
        $('.adena')
    );

    var coefficients = <?php echo json_encode($data) ?>;
    adenaCalc.setCoefficients(coefficients[0].coefficients);

    $('.server').change(function() {
        console.log(coefficients);
        var id = 0;
        var select = $(this);

        $('.server option').each(function(i, option) {
            if($(option).val() == select.val())
                id = i;
        });

        adenaCalc.setCoefficients(coefficients[id].coefficients);
    }).select2({
        minimumResultsForSearch: -1
    });

</script>