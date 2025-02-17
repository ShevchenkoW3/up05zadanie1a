<?php 
include 'template/db.php';
if(!empty($_GET['id_zayavki'])){
    $id_zayavki = $_GET['id_zayavki'];
    $sql = "update zayavki set status = 1 where id_zayavki = $id_zayavki";
    $result = $mysqli->query($sql);
    header('Location: zayavka_administrator.php');
}
?>