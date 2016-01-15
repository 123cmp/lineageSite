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

    if (isset($_POST['data'])) {
        $data = json_decode($_POST['data'], true);

        server_add($link, $data);

        header("Location: index.php?game=" . $data['game_name']);
    }


} else if ($action == 'delete') {

    $id = ($_GET['id']);

    $server = server_delete($link, $id, $game_name);

    if($game_name == 'orders'){

        header("Location: index.php?orders=true");
    } else {
        header("Location: index.php?game=" . $game_name);
    }

} else if ($action == 'edit') {


    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {

        server_edit($link, $id, $game_name, $_POST['server_name'], $_POST['1kk'], $_POST['100kk'], $_POST['1000kk']);
        header("Location: index.php?game=$game_name");
    }

    $server = server_get($id, $link, $game_name);

    //include("../views/server_admin.php");

} 
if(isset($_GET['orders'])){

    if(isset($_POST['data'])){

       $data = json_decode($_POST['data'], true);

       set_status($link, $data[1], $data[0]);
    }

    $orders = orders_get($link);

    include("../views/admin_panel_orders.php");

} else {

    $servers = servers_all($link, $game_name);
    include_once("../views/admin_panel.php");
}
