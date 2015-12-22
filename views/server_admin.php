<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container" id="all">

    <div class="col-xs-4 col-md-offset-4 form">
        <form  method="post"
              action="index.php?action=<?= $_GET['action'] ?>&id=<?= $_GET['id'] ?>&game=<?= $_GET['game'] ?>">
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
</body>

</html>