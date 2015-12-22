<?php


function servers_all($link, $game_name){
    $query = "SELECT * FROM ".$game_name." ORDER BY id DESC";

    $result = mysqli_query($link,$query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $servers = array();
    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $servers[] = $row;
    }
    return $servers;
}

function server_get($id, $link, $game_name)
{
    $query = "SELECT * FROM "."$game_name"." WHERE id=$id";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $article = $row;
    return $article;
}

function server_add($link, $game_name, $server_name, $_1kk, $_100kk, $_1000kk )
{
    $server_name =  trim($server_name);
    $_1kk = trim($_1kk);
    $_100kk = trim($_100kk);
    $_1000kk = trim($_1000kk);

    if ($server_name == '')
        return false;

    $t = "INSERT INTO ".$game_name." (server_name, 1kk, 100kk, 1000kk) VALUES ('%s', '%f', '%f', '%f')";
    $query = sprintf($t, mysqli_real_escape_string($link, $server_name),
        mysqli_real_escape_string($link, $_1kk),
        mysqli_real_escape_string($link, $_100kk),
        mysqli_real_escape_string($link, $_1000kk));
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysql_error($link));
    return true;
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

    $sql = "UPDATE ".$game_name." SET server_name='%s', 1kk='%f', 100kk='%f', 1000kk='%f' WHERE id='%d'";
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
    $query = sprintf("DELETE FROM ".$game_name." WHERE id=%d", $id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    return mysqli_affected_rows($link);
}
