<?php 
include 'template/db.php';
include 'template/head.php';
include 'template/nav_customer.php';
$dir = 'img/'; //Место для размещения прикрепленных файлов
session_start();
if(!empty($_POST)){
    $id_user = $_SESSION['id_user'];
    $id_category = $_POST['id_category'];
    $name_zayavka = $_POST['name_zayavka'];
    $description = $_POST['description'];
    $sql = "insert into zayavki (id_user, id_category, name_zayavka, description, date_zayavka) values ($id_user, $id_category, '$name_zayavka', '$description', now())";
    $result1 = $mysqli->query($sql);
    $insertid = $mysqli->insert_id;
    $file = $dir.$insertid.'_'.basename($_FILES['userfile']['name']); //Имя файла
    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $file)){
        $sql = "update zayavki set img_issue = '$file' where id_zayavki = $insertid";
        $result2 = $mysqli->query($sql);
        header("Location: zayavka_customer.php");
    }
}
?>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h2 style="text-align: center">Введите новую заявку</h2><br>
        <form class="form" enctype="multipart/form-data" action="" method="POST">
            <div class="mb-3">
                <label for="category" class="form-label">Выберите категорию</label>
            <select name="id_category" class="form-select">
                <?php 
                $sql = "select * from categories";
                $categories = $mysqli->query($sql);
                if(!empty($categories)){
                    foreach($categories as $select){
                        echo '<option value="'.$select['id_category'].'">'.$select['name_category'].'</option>';
                    }
                }
                ?>
            </select>
            </div>
            <div class="mb-3">
                <label for="name_zayavka">Введите название проблемы</label>
                <input type="text" class="form-control" name="name_zayavka" required>
            </div>
            <div class="mb-3">
                <label for="description">Описание</label>
                <textarea name="description" id="" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="img_issue" class="form-label">Загрузите изображение</label>
                <input type="hidden" name="MAX_FILE_SIZE" class="form-control" value="10000000" />
                <input class="form-control" type="file" id="userfile" name="userfile">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </div>
        </form>
    </div>
    </div>
</div>