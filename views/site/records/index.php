<h3>Записи текущего пользователя</h3>

<?php
  foreach ($model as $user)
  { echo $user->username;
    foreach ($user->records as $record )
        echo '<h3>'.$record->link.'</h3>';

    //http://via.placeholder.com/350x150
        ?>
      
        <img src='<?=$path.'/img/records//'.$record->link;?>>
      <?


   }
/*
foreach ($model->records as $record)
{
    echo 'user '.$record->user_id.' link '.$record->link;
}*/
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13.02.2018
 * Time: 23:38
 */