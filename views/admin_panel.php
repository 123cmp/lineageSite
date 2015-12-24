<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="../style/style_admin.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <nav>
      <a href ="#" id="logo">Admin Panel</a>
        <ul class="nav pull-right nav-pills">
          <li><a href="#">Orders</a></li>
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

<div id="serverModal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 class = "modal-title" id="myModalLabel">Добавить сервер</h3>
  </div>
  <div class="modal-body">
  <form  method="post"
              action="index.php?action=add&id=<?= $_GET['id'] ?>&game=<?=$GLOBALS['game_name'] ?>">
            <div class="form-group">
                <label for="inputName">Server_name</label>
                <input type="text" id="inputName" class="form-control" name="server_name"
                        class="form-item" required>
            </div>

            <div class="form-inline form-group">
                <label class="modallbl"for="sum1">Gold</label>
                <input type="text" id="sum1" class="form-control" name="sum1"
                       class="form-item" required>
                <label class="modallbl" for="cost1">Coefficient</label>
                <input type="text" id="cost1" class="form-control" name="cost1"
                       class="form-item" required>
            </div>

            <div class="form-inline form-group">
                <label class="modallbl"for="sum2">Gold</label>
                <input type="text" id="sum2" class="form-control" name="sum2"
                       class="form-item" required>
                <label class="modallbl" for="cost2">Coefficient</label>
                <input type="text" id="cost2" class="form-control" name="cost2"
                       class="form-item" required>
            </div>

            <div class="form-inline form-group">
                <label class="modallbl" for="sum3">Gold</label>
                <input type="text" id="sum3" class="form-control" name="sum3"
                       class="form-item " required>
                <label class="modallbl" for="cost3">Coefficient</label>
                <input type="text" id="cost3" class="form-control" name="cost3"
                       class="form-item" required>
            </div>

            <input type="submit" class="btn" value="Save">

        </form>
        </div>
</div>
</div>
</div>
e
<div class="container" id="all">
   <h1 id="tableName"><?=$GLOBALS['game_name']?></h1>
        <table class="table table-bordered table-hover table-responsive">
            <tr>
            <?php foreach ($servers as  $s):
                foreach ($s as $key => $v): ?>
                <th><?=$key?></th> 
            <?php endforeach; 
            break;?>

            <th></th>
            <?php endforeach ?>
                <th id="buttonTh"><a href="#serverModal" role="button" class="btn btn-default" data-toggle="modal">Add server</a></th>
            </tr>
            <tr>
            <?php foreach ($servers as $s):
                foreach ($s as $key => $v): ?>
                <td><?= $s[$key] ?></td>
                <?php endforeach ?>    
                    <!--<td><a href="../admin/index.php?action=edit&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>&">Edit</a></td> -->
                    <td id="buttonTh"><a class="btn btn-danger" href="../admin/index.php?action=delete&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>">Delete</a></td>

                </tr>
                
            <?php endforeach ?>
        </table>
</div>
</table>
</body>
</html>