<?php 
include 'template/head.php';
include 'template/nav.php';
include 'template/db.php';
$message = '';
if(!empty($_POST)){
   $fio = $_POST['fio'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $login = $_POST['login'];
   $password = $_POST['password'];
   $password_repeat = $_POST['password_repeat'];
   if($password == $password_repeat){
    $sql = "insert into users (fio, email, login, password) values ('$fio', '$email', '$login', '$password')";
    $mysqli->query($sql);
    header("Location: login.php");
   }
   else{
    $message = "Пароли не совпадают";
   }   
}
?>
<section class="signup">
    <div class="container">
        <div class="row">
        <h1 class="text-center">Регистрация</h1>
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form class="form" action="signup.php" method="POST">
                <div class="mb-3">
                    <label for = "fio" class="form-label" name ="fio" >Имя пользователя</label>
                    <input type = "text" class="form-control" name = "fio" pattern = "^[А-Яа-яЁё\s]+$" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" name="email">Email</label>
                    <input type="email" class="form-control" name="email" required> 
                </div>
                <div class="mb-3">
                    <label for = "login" class="form-label" name="login" >Логин</label>
                    <input type = "text" class="form-control" name="login" id = "login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" name="password">Пароль</label>
                    <input type="password" class="form-control"  name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_repeat" class="form-label" name="password_repeat">Повторите пароль</label>
                    <input type="password" class="form-control"  name="password_repeat" required>
                </div>
                <div class="mb-3">
                <div class="form-check">
                <input class="form-check-input" id="accept" type="checkbox">
                <label class="form-check-label" for="accept">Я соглашаюсь на обработку персональных данных</label><br>  
                </div>
                <div class="mb-3">
                <input class="btn btn-primary" id="signup" type="submit" value="Зарегистрироваться" disabled><br><br>
                <input type="reset" class="btn btn-primary" value="Очистить">
                </div>
                <div class="mb-3"></div>
                <br>
                <p>
                    <?php
                    echo $message;
                ?>
                </p>
            </form>
            <p id="result"></p>
        </div> 
        <div class=col-lg-1></div>
    </div> 
</div>
</section>
<script>
    $('#accept').click(function(){
	if ($(this).is(':checked')){
		$("#signup").prop("disabled", false);
	} else {
		$("#signup").prop("disabled", true);
	}
});
</script>