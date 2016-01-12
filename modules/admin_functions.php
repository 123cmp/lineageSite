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
    if($game_name == 'lineage_free'){
        $query = "SELECT sum,cost,col FROM coefficients  INNER JOIN " . $game_name . " ON coefficients.server_id = " . $game_name . ".id WHERE coefficients.server_id = " . $game_name . ".id";
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
        $coef = array();
        while ($row = mysqli_fetch_assoc($result)) {

            $coef[] = $row;
        }
        $v = 0;
        $k = ["1k", "1kk", "1kkk"];
        if(!isset($servers))
            return false;
        for ($j = 0; $j < count($servers); $j++) {
            for ($i = 0; $i <= count($coef[$v]); $i++) {
                if($coef[$v]['col'] == false){
               //$servers[$j]["sum_$i"] = $coef[$v]['sum'];
                $servers[$j][$k[$i]] = $coef[$v]['cost'];
                } else {
                   $servers[$j]['col'] = $coef[$v]['cost']; 
                }

                $v++;
                if (!isset($coef[$v])) {
                    break;
                }
            }
        }
    } else {
    $query = "SELECT sum,cost FROM coefficients  INNER JOIN " . $game_name . " ON coefficients.server_id = " . $game_name . ".id WHERE coefficients.server_id = " . $game_name . ".id";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $coef = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $coef[] = $row;
    }
    $v = 0;
    $k = ["1k", "1kk", "1kkk"];
    if(!isset($servers))
        return false;

    for ($j = 0; $j < count($servers); $j++) {
        for ($i = 0; $i <= count($coef[$v]); $i++) {
           //$servers[$j]["sum_$i"] = $coef[$v]['sum'];
            $servers[$j][$k[$i]] = $coef[$v]['cost'];
            $v++;
            if (!isset($coef[$v])) {
                break;
            }
        }
    }
    }
    return $servers;
}

function orders_get($link)
{
    $query = "SELECT * FROM orders";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $orders = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {

        $orders[$i]['id'] = $row['o_id'];
        $orders[$i]['game'] = $row['game'];
        $orders[$i]['server'] = $row['server'];
        $orders[$i]['money'] = $row['money'];

        if($row['col'] == 1){
            $orders[$i]['adena'] = $row['adena']." <b>col</b>";
        } else {
            $orders[$i]['adena'] = $row['adena'];
        }

        $orders[$i]['nickname'] = $row['nickname'];
        $orders[$i]['contact'] = $row['contact'];
        $orders[$i]['comment'] = $row['comment'];
        $orders[$i]['status'] = $row['status'];
        $orders[$i]['time'] = $row['time'];
        $i++;
    }
    return $orders;
}

function server_add($link, $data){

    $server_name = trim($data['server_name']);

    $t = "INSERT INTO " . $data['game_name'] . " (server_name) VALUES ('%s')";
    $query = sprintf($t, mysqli_real_escape_string($link, $server_name));
    $result = mysqli_query($link, $query);

    $id = mysqli_insert_id($link);


    foreach($data['coef'] as $coef){
        $id = (int)$id;
        $t = "INSERT INTO coefficients (server_id, sum, cost, game_name) VALUES ('%d', '%f', '%f', '%s')";
        $query = sprintf($t, mysqli_real_escape_string($link, $id),
            mysqli_real_escape_string($link, $coef['sum']),
            mysqli_real_escape_string($link, $coef['cost']),
            mysqli_real_escape_string($link, $data['game_name']));
        $result = mysqli_query($link, $query);

    }
    if(isset($data['col_coef'])){
    $t = "INSERT INTO coefficients (server_id, sum, cost, game_name, col) VALUES ('%d', '%f', '%f', '%s', '%d')";
        $query = sprintf($t, mysqli_real_escape_string($link, $id),
            mysqli_real_escape_string($link, 1),
            mysqli_real_escape_string($link, $data['col_coef']),
            mysqli_real_escape_string($link, $data['game_name']),
            mysqli_real_escape_string($link, 1));
        $result = mysqli_query($link, $query);
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

function set_status($link, $id, $status){

    $sql = "UPDATE orders SET status='%s' WHERE o_id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $status),
        $id);

    $result = mysqli_query($link, $query);

    if (!$result)

        die(mysqli_error($link));

    return true;
}