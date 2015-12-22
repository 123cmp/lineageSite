<?php

include('model/Coefficient.php');
include('model/Server.php');

$data = [];

for($i = 0; $i < 3; $i ++) {
    $coefficients = [
       new Coefficient(10/($i+1), ($i+1)*1000),
       new Coefficient(10/($i+2), ($i+2)*1000),
       new Coefficient(10/($i+3), ($i+3)*1000),
    ];
    $server = new Server("server".$i, $coefficients);
    array_push($data, $server);
}


?>

<div class="calc">
    <label>
        <b>Server</b>
        <select class="server">
            <?php foreach($data as $i => $server) {
                echo "<option value='{$i}'>{$server->name}</option>";
            }
            ?>
        </select>
    </label>
    <br/>
    <label>
        <b>Я заплачу</b>
        <input class="money" type="text" placeholder="Я заплачу">
    </label>
    <br/>
    <label>
        <b>Я получу</b>
        <input class="adena" type="text" placeholder="Я получу">
    </label>
    <br/>
    <button>Пойдет</button>
</div>

<script>
    var adenaCalc = new AdenaCalc(
        $('.money'),
        $('.adena')
    );

    var coefficients = <?php echo json_encode($data) ?>;
    adenaCalc.setCoefficients(coefficients[0].coefficients);

    $('.server').change(function() {
        var id = $(this).val();
        adenaCalc.setCoefficients(coefficients[id].coefficients);
    })

</script>