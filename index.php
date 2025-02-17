<?php
include 'template/db.php';
include 'template/head.php';
session_start();
if(!empty($_SESSION['id_user'])){
    if($_SESSION['id_user'] == 1){
        include 'template/nav_administrator.php';
    }
    else{
        include 'template/nav_customer.php';
    }
}
else{
    include 'template/nav.php';
}
$sql = "select * from zayavki, categories where zayavki.id_category = categories.id_category and status = 2 order by rand() limit 4";
$result1 = $mysqli->query($sql);
?>
<div class="container" >
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Добро пожаловать</h2>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Решенные заявки</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php 
                if(!empty($result1)){
                    foreach($result1 as $row){
                        echo '
                         <div class="col">
                            <div class="card">
                                <img src="'.$row['img_solved'].'" class="card-img-top" alt="...">
                                <div class="card-body">
                            <h5 class="card-title">'.$row['date_zayavka'].'</h5>
                            <p class="card-text">'.$row['name_zayavka'].'<br>'.$row['name_category'].'</p>
                        </div>
                    </div>
                    </div>';
                    }
                }
                else{
                    echo '<p class="text-center">Нет решенных проблем</p>';
                }
                ?>  
        </div>
        </div>
    </div>
</div><br>
<?php include 'template/footer.php';?>