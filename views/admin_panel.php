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
                    <li><a href="../admin/index.php?orders=true">Orders</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Games</a>
                        <ul class="dropdown-menu">
                            <li><a href="../admin/index.php?game=lineage_rus">Lineage II rus</a></li>
                            <li><a href="../admin/index.php?game=lineage_classic_rus">Lineage II classic rus</a></li>
                            <li><a href="../admin/index.php?game=lineage_classic_euro">Lineage II classic euro</a></li>
                            <li><a href="../admin/index.php?game=lineage_free">Lineage II free</a></li>
                        </ul>
                    </li>
                    <li><a href="../index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div id="serverModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Добавить сервер</h3>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="form-inline form-group">
                    <label for="inputName">Server_name</label>
                    <input type="text" id="inputName" class="form-control form-item" name="server_name"
                           required>
                    <input type="hidden" id="gameName" value="<?= $GLOBALS['game_name']?>">
                  <!--  <button class="btn" id="addCoef">Add one more</button> -->
                </div>
                <div class="form-group coef">
                    <label class="modallbl" for="sum">1k</label>
                    <input type="hidden" id="sum" class="form-control form-item" value="1000" required>
                    <label class="modallbl" for="cost">Coefficient</label>
                    <input type="number" id="cost" class="form-control form-item" name="cost" required>
                </div>
                <div class="form-group coef">
                    <label class="modallbl" for="sum">1kk</label>
                    <input type="hidden" id="sum" class="form-control form-item" value="1000000" required>
                    <label class="modallbl" for="cost">Coefficient</label>
                    <input type="number" id="cost" class="form-control form-item" name="cost" required>
                </div>
                <div class="form-group coef">
                    <label class="modallbl" for="sum">1kkk</label>
                    <input type="hidden" id="sum" class="form-control form-item" value="1000000000" required>
                    <label class="modallbl" for="cost">Coefficient</label>
                    <input type="number" id="cost" class="form-control form-item" name="cost" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" id="Save" data-dismiss="modal" aria-hidden="true">Save</button>
            </div>
        </div>
    </div>

</div>

<div class="container" id="all">
    <h1 id="tableName"><?= $GLOBALS['game_name'] ?></h1>
    <table id="dataTable" class="table  table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <?php foreach ($servers as $s):
                foreach ($s as $key => $v): ?>
                    <th><?= $key ?></th>
                <?php endforeach;
                break;?>

                <th></th>
            <?php endforeach ?>
            <th id="buttonTh"><a href="#serverModal" role="button" class="btn btn-default" data-toggle="modal">Add
                    server</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($servers as $s) {
            echo '<tr>';
            foreach ($s as $key => $v) {
                if($s[$key] == '0' )
                    $s[$key] = "-";
                echo "<td>{$s[$key]}</td>";
            }
            echo "<td id=\"buttonTh\"><a class=\"btn btn-danger\"
                                 href=\"../admin/index.php?action=delete&id={$s['id']}&game={$GLOBALS['game_name']}\">Delete</a>
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