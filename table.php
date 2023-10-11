<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <?php include('func.php') ?>

    <div class="column">
        <?php
        $get = "";
        if ($_GET && $_GET['page'] < 10 && $_GET['page'] > 1) {
            $get = $_GET['page'];
            // var_dump($_GET['page']);
            echo table($get);
            ?>
            <div class="button">
                <a  href="?">Назад</a>
            </div>
            <?php
        } else {
            for ($i = 2; $i < 10; $i++) {
                echo table($i);
            }
        }
        ?>
    </div>
</body>
</html>