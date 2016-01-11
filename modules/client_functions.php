<?php

function getGameCoefficients($link, $game_name, $col) {
    $game_name = mysqli_real_escape_string($link, (string) $game_name);
    $cause = " AND col = 0 ";
    if($col) $cause = " AND col = 1 ";
    $query = "SELECT * FROM coefficients WHERE game_name = '".$game_name."' {$cause} ORDER BY sum ASC";

    $result = mysqli_query($link,$query);

    if (!$result)
        die(mysqli_error($link));

    return sqlResultToArray($result);
}

function getGameServers($link, $game_name) {
    $game_name = mysqli_real_escape_string($link, (string) $game_name);
    $query = "SELECT * FROM ".$game_name." ORDER BY id DESC";

    $result = mysqli_query($link,$query);

    if (!$result)
        die(mysqli_error($link));

    return sqlResultToArray($result);
}

function findCoefficient($coefficients, $value) {
    $coefficientId = null;

    $coefficientsCount = sizeof($coefficients);
    $lastCoefficientId = $coefficientsCount - 1;
    $lastCoefficient = $coefficients[$lastCoefficientId];
    $firstCoefficient = $coefficients[0];

    if($value < $firstCoefficient->count)
        $coefficientId = 0;
    else if($value > $lastCoefficient->count)
        $coefficientId = $lastCoefficientId;
    else
        forEach($coefficients as $i => $coefficient) {
            if($value >= $coefficient->count) {
                $coefficientId = $i;
            }
        }

    return $coefficientId;
}

function adenaToMoney($adena, $coefficient) {
    return $adena / $coefficient->value;
}

function saveRequest($link, $request) {
    $query = "INSERT INTO orders (game, server, money, adena, nickname, contact, comment, col)
      VALUES ('{$request->game}', '{$request->server}', {$request->money}, {$request->adena},
      '{$request->nickname}', '{$request->contact}', '{$request->comment}', '{$request->col}')";

    $result = mysqli_query($link, $query);

    if (!$result) {
        return(mysqli_error($link));
    } else {
        return true;
    }

}

function sqlResultToArray($sqlResult) {
    $n = mysqli_num_rows($sqlResult);
    $array = array();
    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($sqlResult);
        $array[] = $row;
    }
    return $array;
}
