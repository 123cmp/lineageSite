<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div id="serverModal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class = "modal-title" id="myModalLabel">Добавить сервер</h3>
  </div>
  <div class="modal-body">
  <form  method="post"
              action="index.php?action=add&id=<?= $_GET['id'] ?>&game=<?= $_GET['game'] ?>">
            <div class="form-group">
                <label for="inputName">
                    Server_name
                </label>
                <input type="text" id="inputName" class="form-control" name="server_name"
                       value="<?= $server['server_name'] ?>" class="form-item" required>
            </div>

            <div class="form-group">
                <label for="input1kk">
                    1kk
                </label>
                <input type="text" id="input1kk" class="form-control" name="1kk" value="<?= $server['1kk'] ?>"
                       class="form-item" required>

            </div>
            <div class="form-group">
                <label for="input100kk">
                    100kk
                </label>
                <input type="text" id="input100kk" class="form-control" name="100kk" value="<?= $server['100kk'] ?>"
                       class="form-item" required>
            </div>
            <div class="form-group">
                <label for="input1000kk">
                    1000kk
                </label>
                <input type="text" id="input1000kk" class="form-control" name="1000kk" value="<?= $server['1000kk'] ?>"
                       class="form-item" required>

            </div>
            <input type="submit" class="btn" value="Save">

        </form>
        </div>
</div>
</div>
</div>

<div class="container" id="all">
    <h1>Admin Panel</h1>

    <div>
    <a href="#serverModal" role="button" class="btn btn-default" data-toggle="modal">Add server</a>
        <!--<a href="../admin/index.php?action=add&game=<?=$GLOBALS['game_name']?>">Add server</a>-->
        <a class="btn btn-default" href="../index.php"> Go homepage  </a>
        <a class="btn btn-default" href="../admin/index.php?game=lineage_rus"> Lineage II RUS </a>
        <a class="btn btn-default" href="../admin/index.php?game=lineage_classic_rus"> Lineage II Classic (RUS) </a>
        <a class="btn btn-default" href="../admin/index.php?game=lineage_classic_euro"> Lineage II Classic (Euro) </a>
        <a class="btn btn-default" href="../admin/index.php?game=lineage_free"> Lineage (Free) </a>

        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Server Name</th>
                <th>от 1 кк</th>
                <th>от 100 кк</th>
                <th>от 1000 кк</th>
                <!--<th></th>-->
                <th></th>
            </tr>
            <?php foreach ($servers as $s): ?>
                <tr>
                    <td><?= $s['server_name'] ?></td>
                    <td><?= $s['1kk'] ?></td>
                    <td><?= $s['100kk'] ?></td>
                    <td><?= $s['1000kk'] ?></td>
                    <!--<td><a href="../admin/index.php?action=edit&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>&">Edit</a></td> -->
                    <td><a class="btn btn-danger" href="../admin/index.php?action=delete&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>">Delete</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

</body>
</html>