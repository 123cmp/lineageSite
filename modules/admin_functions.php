<?php

function servers_all($link, $game_name)
{

    $query = "SELECT * FROM " . $game_name;
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $servers = array();
    while ($row = mysqli_fetch_assoc($result)) {
        ;
        $servers[] = $row;
    }
    $id = array();
    foreach ($servers as $s) {
        $id[] = $s['id'];
    }

    $query = "SELECT sum,cost FROM coefficients  INNER JOIN " . $game_name . " ON coefficients.server_id = " . $game_name . ".id WHERE coefficients.server_id = " . $game_name . ".id";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $coef = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $coef[] = $row;
    }
    $v = 0;
    if(!isset($servers))
        return false;
    for ($j = 0; $j < count($servers); $j++) {
        for ($i = 0; $i <= count($coef[$v]); $i++) {

            $servers[$j]["sum_$i"] = $coef[$v]['sum'];
            $servers[$j]["cost_$i"] = $coef[$v]['cost'];
            $v++;
            if (!isset($coef[$v])) {
                break;
            }
        }
    }
    return $servers;
}

function server_get($id, $link, $game_name)
{
    $query = "SELECT * FROM " . "$game_name" . " WHERE id=$id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $article = $row;
    return $article;
}

function server_add($link, $game_name, $server_name, $sum, $cost)
{
    $server_name = trim($server_name);

    $t = "INSERT INTO " . $game_name . " (server_name) VALUES ('%s')";
    $query = sprintf($t, mysqli_real_escape_string($link, $server_name));
    $result = mysqli_query($link, $query);

    $id = mysqli_insert_id($link);

    $i = 0;
    while ($i < count($sum)) {
        $id = (int)$id;
        $t = "INSERT INTO coefficients (server_id, sum, cost, game_name) VALUES ('%d', '%f', '%f', '%s')";
        $query = sprintf($t, mysqli_real_escape_string($link, $id),
            mysqli_real_escape_string($link, $sum[$i]),
            mysqli_real_escape_string($link, $cost[$i]),
            mysqli_real_escape_string($link, $game_name));
        $result = mysqli_query($link, $query);

        $i++;

    }

}

function server_edit($link, $id, $game_name, $server_name, $_1kk, $_100kk, $_1000kk)
{
    $id = (int)$id;
    $server_name = trim($server_name);
    $_1kk = trim($_1kk);
    $_100kk = trim($_100kk);
    $_1000kk = trim($_1000kk);

    if ($server_name == '')
        return false;

    $sql = "UPDATE " . $game_name . " SET server_name='%s', 1kk='%f', 100kk='%f', 1000kk='%f' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $server_name),
        mysqli_real_escape_string($link, $_1kk),
        mysqli_real_escape_string($link, $_100kk),
        mysqli_real_escape_string($link, $_1000kk),
        $id);
    $result = mysqli_query($link, $query);

    if (!$result)

        die(mysqli_error($link));

    return true;
}

function server_delete($link, $id, $game_name)
{
    $id = (int)$id;
    if ($id == 0)
        return false;
    $query = sprintf("DELETE FROM " . $game_name . " WHERE id=%d", $id);
    $result = mysqli_query($link, $query);

    $query = sprintf("DELETE FROM coefficients WHERE server_id=%d", $id);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
    return mysqli_affected_rows($link);
}
