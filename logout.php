<?php
session_start();
$_SESSION['id_user'] = $user['id_user'];
$_SESSION['role'] = $user['role'];
unset($_SESSION['id_user']);
unset($_SESSION['role']);
header("Location: index.php");
?>