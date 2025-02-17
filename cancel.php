<?php
include 'template/head.php';
include 'template/nav_administrator.php';
include 'template/db.php';
if(!empty($_GET['id_zayavki'])){
    if(!empty($_POST)){
        $id_zayavki = $_GET['id_zayavki'];
        $reason_cancel = $_POST['reason_cancel'];
        $sql = "update zayavki set status = 3, reason_cancel = '$reason_cancel' where id_zayavki = $id_zayavki";
        var_dump($sql);
        $result5 = $mysqli->query($sql);
        header('Location: zayavka_administrator.php');

    }    
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form class="form" action="" method="POST">
                <div class="mb-3">
                    <label for="reason_cancel" class="form-label">Напишите причину отмены</label>
                    <textarea name="reason_cancel" class="form-control" cols=10></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Продолжить">
                </div>
            </form>
        </div>
    </div>
</div>