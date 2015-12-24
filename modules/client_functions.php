<?php

function getGameCoefficients($link, $game_name) {
    $game_name = mysqli_real_escape_string($link, (string) $game_name);
    $query = "SELECT * FROM coefficients WHERE game_name = '".$game_name."' ORDER BY c_id DESC";

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

function saveRequest($link, $request) {
    $query = "INSERT INTO requests (game, server, money, adena, nickname, contact, comment)
      VALUES ('{$request->game}', '{$request->server}', {$request->money}, {$request->adena},
      '{$request->nickname}', '{$request->contact}', '{$request->comment}')";

    echo $query;
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
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