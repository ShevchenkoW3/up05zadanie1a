<?php
include 'template/db.php';
if(!empty($_POST['login'])){
    $login = $_POST['login'];
    $sql = "select * from users where login = '$login'";
    $result2 = $mysqli->query($sql);
    $user = mysqli_fetch_assoc($result2);
    if(!empty($user)){
        echo 'Пользователь с таким логином уже существует';
    }
    else{
        echo '';
    }
}
?>