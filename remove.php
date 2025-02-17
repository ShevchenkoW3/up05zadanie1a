<?php 
include 'template/db.php';
if(!empty($_GET['id_zayavki'])){
    $id_zayavki = $_GET['id_zayavki'];
    $sql = "delete from zayavki where id_zayavki = $id_zayavki";
    $result = $mysqli->query($sql);
    header('Location: zayavka_customer.php');
}
?>