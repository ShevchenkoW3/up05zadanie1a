<?php
include 'template/head.php';
include 'template/nav_administrator.php';
include 'template/db.php';
$sql = "select * from zayavki, categories, users where categories.id_category = zayavki.id_category and zayavki.id_user = users.id_user";
$result = $mysqli->query($sql);
?>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-align: center">Заявки</h2><br>
            <table class="table">
                <thead>
                    <tr class="table-success">
                        <th>№</th>
                        <th>ФИО</th>
                        <th>Дата</th>
                        <th>Категория</th>
                        <th>Название проблемы</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Статус</th>
                        <th>Причина отмены</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    <?php 
                    if(!empty($result)){
                        foreach($result as $row){
                            echo '
                            <tr>
                                <td>'.$row['id_zayavki'].'</td>
                                <td>'.$row['fio'].'</td>
                                <td>'.$row['date_zayavka'].'</td>
                                <td>'.$row['name_category'].'</td>
                                <td>'.$row['name_zayavka'].'</td>
                                <td>'.$row['description'].'</td>
                                <td><a href="photos.php?id_zayavki='.$row['id_zayavki'].'">Просмотр</a></td>';
                                if($row['status'] == 0){
                                    echo '<td>Новая</td>';
                                }
                                elseif($row['status'] == 1){
                                    echo '<td>В работе</td>';
                                }
                                elseif ($row['status'] == 2){
                                    echo '<td>Завершена</td>';
                                }
                                elseif ($row['status'] == 3){
                                    echo '<td>Отклонена</td>';
                                }
                                else{
                                    echo '<td>Отменена</td>';
                                }
                                echo '
                                <td>'.$row['reason_cancel'].'</td>';
                                if($row['status'] == 0){
                                    echo '<td><a href="accept.php?id_zayavki='.$row['id_zayavki'].'">Принять</a></td>
                                    <td><a href="cancel.php?id_zayavki='.$row['id_zayavki'].'">Отклонить</a></td>';
                                }
                                elseif($row['status'] == 1){
                                    echo '<td><a href="close.php?id_zayavki='.$row['id_zayavki'].'">Завершить</a></td>
                                    <td></td>';
                                }
                                else{
                                    echo '<td></td> 
                                    <td></td>';
                                }
                                echo '
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