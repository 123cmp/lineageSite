<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../style/style_admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container" id="all">
    <h1>Admin Panel</h1>

    <div>
        <a href="../admin/index.php?action=add&game=<?=$GLOBALS['game_name']?>">Add server</a>
        <a href="../index.php"> Go homepage  </a>
        <a href="../admin/index.php?game=lineage_rus"> Lineage II RUS </a>
        <a href="../admin/index.php?game=lineage_classic_rus"> Lineage II Classic (RUS) </a>
        <a href="../admin/index.php?game=lineage_classic_euro"> Lineage II Classic (Euro) </a>
        <a href="../admin/index.php?game=lineage_free"> Lineage (Free) </a>
        <table class="admin-table">
            <tr>
                <th>Server Name</th>
                <th>от 1 кк</th>
                <th>от 100 кк</th>
                <th>от 1000 кк</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($servers as $s): ?>
                <tr>
                    <td><?= $s['server_name'] ?></td>
                    <td><?= $s['1kk'] ?></td>
                    <td><?= $s['100kk'] ?></td>
                    <td><?= $s['1000kk'] ?></td>
                    <td><a href="../admin/index.php?action=edit&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>">Edit</a></td>
                    <td><a href="../admin/index.php?action=delete&id=<?= $s['id'] ?>&game=<?=$GLOBALS['game_name']?>">Delete</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

</div>
</body>
</html>