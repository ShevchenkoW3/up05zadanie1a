<?php
include "template/db.php";
include "template/head.php";
include "template/nav.php";
$message = '';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE login = '$login' AND password ='$password'";
    $result=$mysqli->query($sql);
    $user=mysqli_fetch_assoc($result);
    if (!empty($user)) {
    session_start();
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['role'] = $user['role'];
    header('Location: index.php');
}
    else {
        $message = 'Логин или пароль введены неверно, пожалуйста повторите попытку';
    } 
}
?> 
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 style="text-align: center">Войти</h1>
            <form class="form-inline" action="" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="password" required><br>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Войти</button>
                    <p><?php echo $message ?></p>
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
</div>