<?php
session_start();

define('PSW', password_hash('123', PASSWORD_BCRYPT));
const UPLOAD_PATH = 'upload/';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //  var_dump($_FILES); 
    
    //                    die;
    if(isset($_POST['singin'])){
        $login = trim(strip_tags($_POST['login']));
        $psw = $_POST['psw'];

        if($login 
        && password_verify($psw,PSW)){
            $fileName = $login . '_' . time() . '.png';
            if(empty($_FILES['avatar']['error'])
            && move_uploaded_file($_FILES['avatar']
            ['tmp_name'], UPLOAD_PATH . $fileName)){
            $_SESSION['user'] = [
                'auth' => true,
                'login' => $login,
                'avatar' => UPLOAD_PATH . $fileName,
            ];
        }
        }
    }
    if(isset($_POST['logout'])){
        // unset($_SESSION['auth']);
        session_destroy();
    }
    header('Location: ' . $_SERVER['SCRIPT_NAME']);
    exit;
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta  
     name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" > 
    <title>Register</title> 
</head> 
<body> 
    <?php var_dump($_SESSION); ?>
    <?php if(empty($_SESSION['user'])):?>
<form action=" " method='post' enctype="multipart/form-data"> 
    <div>Login: <input type="text" name="login"></div> 
    <div> Password: <input type="text" name="psw"></div> 
    <div> Avatar: <input type="file" name="avatar"></div> 
    <div><input type="submit" value="Вход" name="singin" ></div> 
</form> 
<?php else: ?>
    <img style='width: 60px;' src="<?=$_SESSION['user']['avatar']?>" alt="avatar">
    user: <?= $_SESSION ['user']['login']?>
    <form action=" " method='post'> 
    <div><input type="submit" value="Выход" name="logout" ></div>   
    </form> 
   
 <?php endif ?>
</body> 
</html>
