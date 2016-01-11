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

$connection = Connection::getInstance();
$link = $connection->getLink();

if(!isset($_GET['game']))
    $game = 'lineage_free';
else
    $game = $_GET['game'];

$coefficients = getGameCoefficients($link, $game, true);
$servers = getGameServers($link, $game);

foreach($servers as $i => $server) {
    $serverCoefficients = [];
    foreach($coefficients as $j => $coefficient) {
        if($coefficient["server_id"] === $server["id"])
            array_push($serverCoefficients,
                new Coefficient($coefficient["cost"], $coefficient["sum"]));
    }

    $name = $server["server_name"];
    $id = $server["id"];
    $server = new Server($name, $serverCoefficients, $id);
    array_push($data, $server);
}

function toKK($value) {
    if(is_numeric($value)) {
        $value = (string) $value;
        $pos = strpos($value, '000');
        while ($pos !== false) {
            $value = substr_replace($value, 'k', $pos, strlen('000'));
            $pos = strpos($value, '000');
        }
    }

    return $value;
}

function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}

?>

<div class="calc">
    <h2>Калькулятор COL</h2>
    <div class="first">
        <form>
            <label>
                <select class="server" name="server">
                    <?php foreach($data as $i => $server) {
                        echo "<option value='{$server->name}' data-id='{$i}' data-server-id='{$server->id}'>{$server->name}</option>";
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

    <div class="payments">
        <h2>Наши цены</h2>
        <table>
            <thead>
            <tr>
                <th>Сервер</th>
                <th>1 COL</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($data as $i => $server) {
                    echo "<tr>
                        <td>{$server->name}</td>
                        <td>{$server->getMoney(1)}</td>
                    </tr>";
                }
            ?>

            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {
        var first = $('.calc .first');
        var second = $('.calc .second');
        var money = $('.money');
        var adena = $('.adena');


        jQuery.validator.addMethod("formated", function(value, element) {
            return Number.isInteger(number_unformat(value));
        });

        jQuery.validator.addMethod("fmax", function(value, element, params) {
            return number_unformat(value) < params;
        });

        jQuery.validator.addMethod("fmin", function(value, element, params) {
            return number_unformat(value) > params;
        });

        money.digitsOnly()
            .keyup(function(){
                $(this).val( number_format ( $(this).val() ) );
            });
        adena.digitsOnly()
            .keyup(function(){
                $(this).val( number_format ( $(this).val() ) );
            });

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
                        col: true,
                        money: number_unformat($('.money').val()),
                        adena: number_unformat($('.adena').val()),
                        nickname: $('.nickname').val(),
                        contact: $('.contact').val(),
                        comment: $('.comment').val()
                    },
                    complete: function(res) {
                        if(res.responseText == 'OK') {
                            $.notific8('Заявка отправлена', {theme: 'shamrock', family: 'chicchat'});
                        } else {
                            console.log(res);
                            $.notific8('Произошла ошибка', {theme: 'ruby', family: 'chicchat'});
                        }
                    }
                })
            }
            return false;
        });
        var adenaCalc = new AdenaCalc(
            adena,
            money
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
                    formated: true
                },
                adena: {
                    required: true,
                    fmin: 1,
                    fmax: 19000,
                    formated: true
                }
            },
            messages: {
                server: {
                    required: 'Пожалуйста выберите сервер'
                },
                money: {
                    required: 'Пожалуйста введите сумму денег',
                    formated: 'Не корректная сумма денег'
                },
                adena: {
                    required: 'Пожалуйста введите количество COL',
                    fmin: 'Введенное количество COL меньше минимального',
                    fmax: 'Введенное количество COL больше максимального',
                    formated: 'Не корректное количество COL'
                }
            }
        });

        second.find('form').validate({
            rules: {
                nickname: {
                    required: true,
                    minlength: 2,
                    maxlength: 16
                },
                contact: {
                    required: true,
                    minlength: 2,
                    maxlength: 140
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