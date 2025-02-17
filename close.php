<?php
include 'template/head.php';
include 'template/nav_administrator.php';
include 'template/db.php';
$dir = 'img/'; //Место для размещения прикрепленных файлов
if(!empty($_GET['id_zayavki'])){
    if(!empty($_POST)){
        $id_zayavki = $_GET['id_zayavki'];
        $sql = "update zayavki set status = 2 where id_zayavki = $id_zayavki";
        var_dump($sql);
        $result3 = $mysqli->query($sql);
        $file = $dir.$id_zayavki.'_'.basename($_FILES['userfile']['name']); //Имя файла
        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $file)){
            $sql = "update zayavki set img_solved = '$file' where id_zayavki = $id_zayavki";
            var_dump($sql);
            $result4 = $mysqli->query($sql);
            header('Location: zayavka_administrator.php');
         }
    }    
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form class="form" enctype="multipart/form-data" action="" method="POST">
                <div class="mb-3">
                    <label for="img_soloved" class="form-label">Вставьте изображение</label>
                    <input type="hidden" name="MAX_FILE_SIZE" class="form-control" value="10000000" />
                    <input class="form-control" type="file" id="userfile" name="userfile">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Продолжить">
                </div>
            </form>
        </div>
    </div>
</div>