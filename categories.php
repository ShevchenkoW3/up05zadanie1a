<?php 
include 'template/head.php';
include 'template/nav_administrator.php';
include 'template/db.php';
if(!empty($_POST)){
    $name_category = $_POST['name_category'];
    $sql = "insert into categories (name_category) values ('$name_category')";
    $result7 = $mysqli->query($sql);
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-inline" action="" method="POST">
                <p><b>Введите новую категорию</b></p><br>
                <div class="mb-2">
                    <input type="text" class="form-control" name="name_category">
                </div>
                <div class="mb-2">
                    <input type="submit" class="btn btn-success" value="Добавить">
                </div>
            </form><br>
            <table class="table">
                <thead>
                    <tr class="table-success">
                        <th>№</th>
                        <th>Название категории</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                    $sql = "select * from categories";
                    $result6 = $mysqli->query($sql);
                    if(!empty($result6)){
                        foreach($result6 as $row){
                            echo '
                            <tr>
                                <td>'.$row['id_category'].'</td>
                                <td>'.$row['name_category'].'</td>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>