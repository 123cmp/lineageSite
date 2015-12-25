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
        <form>
            <label>
                <select class="server" name="server">
                    <?php foreach($data as $i => $server) {
                        echo "<option value='{$server->name}' data-id='{$i}'>{$server->name}</option>";
                    }
                    ?>
                </select>
            </label>
            <br/>
            <label>
                <input class="money" pattern="\d+" name="money" type="text" placeholder="Я заплачу">
            </label>
            <br/>
            <label>
                <input class="adena" pattern="\d+" name="adena" type="text" placeholder="Я получу">
            </label>
            <br/>
            <button>Пойдет</button>
        </form>
    </div>
    <div class="second" style="display: none">
        <form>
            <label>
                <input class="nickname" name="nickname" type="text" placeholder="Ник">
            </label>
            <br/>
            <label>
                <input class="contact" name="contact" type="text" placeholder="Контакт">
            </label>
            <br/>
            <label>
                <textarea class="comment" name="comment" placeholder="Комментарий"></textarea>
            </label>
            <br/>
            <button>Пойдет</button>
        </form>
    </div>


</div>

<script>
    $(document).ready(function() {
        var first = $('.calc .first');
        var second = $('.calc .second');
        var money = $('.money');
        var adena = $('.adena');

        money.digitsOnly();
        adena.digitsOnly();

        first.find('button').click(function() {
            var valid = first.find('form').valid();
            if(valid) {
                first.hide();
                second.show();
            }
            return false;
        });
        second.find('button').click(function() {
            var valid = second.find('form').valid();
            if(valid) {
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
            }
            return false;
        });
        var adenaCalc = new AdenaCalc(
            money,
            adena
        );

        var coefficients = <?php echo json_encode($data) ?>;
        adenaCalc.setCoefficients(coefficients[0].coefficients);

        first.find('form').validate({
            rules: {
                server: {
                    required: true
                },
                money: {
                    required: true,
                    minlength: 3,
                    maxlength: 16,
                    number: true
                },
                adena: {
                    required: true,
                    minlength: 5,
                    maxlength: 26,
                    number: true
                }
            },
            messages: {
                server: {
                    required: 'Пожалуйста выберите сервер'
                },
                money: {
                    required: 'Пожалуйста введите сумму денег',
                    minlength: 'Введенная сумма денег меньше минимальной',
                    maxlength: 'Введенная сумма денег больше максимальной',
                    number: 'Не корректная сумма денег'
                },
                adena: {
                    required: 'Пожалуйста введите количество адены',
                    minlength: 'Введенное количество адены меньше минимальной',
                    maxlength: 'Введенное количество адены меньше больше максимальной',
                    number: 'Не корректное количество адены'
                }
            }
        });

        second.find('form').validate({
            rules: {
                nickname: {
                    required: true,
                    minlength: 3,
                    maxlength: 40
                },
                contact: {
                    required: true,
                    minlength: 3,
                    maxlength: 40
                }
            },
            messages: {
                nickname: {
                    required: 'Пожалуйста введите ваш ник в игре',
                    minlength: 'Ник слишком короткий',
                    maxlength: 'Ник слишком длинный'
                },
                contact: {
                    required: 'Пожалуйста введите ваши контактные данные',
                    minlength: 'Контактные данные слишком короткие',
                    maxlength: 'Контактные данные слишком длинные'
                }
            }
        });

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
    });


</script>