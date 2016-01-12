<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style_admin.css">
</head>
<body>
<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <nav>
                <a href="#" id="logo">Admin Panel</a>
                <ul class="nav pull-right nav-pills">
                    <li><a href="../a!dmin/index.php?orders=true">Orders</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Games</a>
                        <ul class="dropdown-menu">
                            <li><a href="../a!dmin/index.php?game=lineage_rus">Lineage II rus</a></li>
                            <li><a href="../a!dmin/index.php?game=lineage_classic_rus">Lineage II classic rus</a></li>
                            <li><a href="../a!dmin/index.php?game=lineage_classic_euro">Lineage II classic euro</a></li>
                            <li><a href="../a!dmin/index.php?game=lineage_free">Lineage II free</a></li>
                        </ul>
                    </li>
                    <li><a href="../index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="container" id="all">
    <h1 id="tableName">Orders</h1>
    <table id="dataTable" class="table  table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <?php foreach ($orders as $s):
                foreach ($s as $key => $v): ?>
                    <th><?= $key ?></th>
                <?php endforeach;
                break;?>

                <th></th>
            <?php endforeach ?>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $s) {
            echo '<tr>';
            foreach ($s as $key => $v) {

                if($key == "status"){
                    if($s[$key] == "new"){
                        $status = "done";
                    } else $status = "new";
                    echo "<td><select class=\"status\">
                    <option id=\"{$s["o_id"]}\">{$s[$key]}</option>
                    <option id=\"{$s['o_id']}\">$status</option>
                    </select></td>";
                } else

                echo "<td>{$s[$key]}</td>";
            }
            echo "<td id=\"buttonTh\"><a class=\"btn btn-danger\"
                                 href=\"../a!dmin/index.php?action=delete&id={$s{'o_id'}}\">Delete</a>
            </td>";
            echo '</tr>';
        } ?>
        </tbody>
    </table>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="../scripts/Admin.js"></script>
</body>
</html>