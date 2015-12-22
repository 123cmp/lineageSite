<?php

require_once("../modules/database.php");
require_once("../modules/admin_functions.php");

$link = db_connect();


if (isset($_GET['game'])) {

    $game_name = $_GET['game'];

} else {
    $game_name = "lineage_rus";

}
if (isset($_GET['action'])) {

    $action = $_GET['action'];


} else {

    $action = '';
}

if ($action == 'add') {

    if (!empty($_POST)) {

        $game_name = $_GET['game'];

        server_add($link, $game_name, $_POST['server_name'], $_POST['1kk'], $_POST['100kk'], $_POST['1000kk']);
        header("Location: index.php?game=" . $game_name);

    }
    $server = array('server_name' => '', '1kk' => '', '100kk' => '', '1000kk' => '',);
    include("../views/server_admin.php");

} else if ($action == 'delete') {

    $id = ($_GET['id']);

    $server = server_delete($link, $id, $game_name);
    header("Location: index.php?game=$game_name");

} else if ($action == 'edit') {


    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {

        server_edit($link, $id, $game_name, $_POST['server_name'], $_POST['1kk'], $_POST['100kk'], $_POST['1000kk']);
        header("Location: index.php?game=$game_name");
    }

    $server = server_get($id, $link, $game_name);
    include("../views/server_admin.php");

} else {

    $servers = servers_all($link, $game_name);
    include("../views/admin_panel.php");
}
