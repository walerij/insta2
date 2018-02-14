

<?php
foreach ($model as $user) {
   
    foreach ($user->records as $record) {

        //http://via.placeholder.com/350x150
        ?>
        <div class="thumbnail">
            <img src='<?= '/img/records//' . $record->link; ?>' style="height: 300px">
            <div class="thumbnail panel-info">
                <strong><?= $user->username; ?>
                    <span class="bg-info"><?= $record->record_date; ?></span>
                
                </strong>
                
                <p><?= $record->record_info; ?></p>
                <div class="right">
                    <a class="bg-info" href="#">Комментарии:0 </a>
                </div>
            </div>  

        </div>

<?
}

}
