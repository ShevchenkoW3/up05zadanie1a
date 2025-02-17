<?php 
include 'template/head.php';
include 'template/nav_customer.php';
include 'template/db.php';
if(!empty($_GET['id_zayavki'])){
    $id_zayavki = $_GET['id_zayavki'];
    $sql = "select img_issue, img_solved from zayavki where id_zayavki = $id_zayavki";
    $result = $mysqli->query($sql);
}
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
        <div class="row row-cols-1 row-cols-md-2 g-2">
    <?php 
    if(!empty($result)){
        foreach($result as $row){
            echo '
              <div class="col">
    <div class="card">
      <img src="'.$row['img_issue'].'" class="card-img-top" alt="До">
      <div class="card-body">
        <h5 class="card-title">До</h5>
      </div>
    </div>
  </div>';
  if(!empty($row['img_solved'])){
    echo '
    <div class="col">
    <div class="card">
      <img src="'.$row['img_solved'].'" class="card-img-top" alt="После">
      <div class="card-body">
        <h5 class="card-title">После</h5>
      </div>
    </div>
  </div>
    ';
  }
  else{
    echo '';
  }
        }
    }
    ?>
</div><br>
        <?php
        session_start();
        $id_user = $_SESSION['id_user'];
        if($id_user == 1){
          echo '<a href="zayavka_administrator.php" role="button" class="btn btn-success">Назад</a>';
        }
        else{
          echo '<a href="zayavka_customer.php" role="button" class="btn btn-success">Назад</a>';
        }
        ?>
        </div>
    </div>
</div>