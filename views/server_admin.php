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

    <div>
        <form method="post" action="index.php?action=<?= $_GET['action'] ?>&id=<?= $_GET['id'] ?>&game=<?= $_GET['game'] ?>">
            <label class="form-item">
                Server_name
                </br>
                <input type="text" name="server_name" value="<?= $server['server_name'] ?>" class="form-item" required>
            </label>
            </br>
            <label class="form-item">
                1kk
                </br>
                <input type="text" name="1kk" value="<?= $server['1kk'] ?>" class="form-item" required>
            </label>
            </br>
            <label class="form-item">
                100kk
                </br>
                <input type="text" name="100kk" value="<?= $server['100kk'] ?>" class="form-item" required>
            </label>
            </br>
            <label class="form-item">
                1000kk
                </br>
                <input type="text" name="1000kk" value="<?= $server['1000kk'] ?>" class="form-item" required>
            </label>
            <br>
            <input type="submit" class="btn" value="Save">
        </form>

    </div>
</div>

</div>
</body>

</html>