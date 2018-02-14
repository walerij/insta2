<h3>Записи текущего пользователя</h3>

<?php
foreach ($model as $user) {
    echo $user->username;
    foreach ($user->records as $record) {

        //http://via.placeholder.com/350x150
        ?>
        <div class="thumbnail">
            <img src='<?= '/img/records//' . $record->link; ?>' style="height: 300px">
        </div>
        <div class="thumbnail">
            <strong><?= $user->username; ?></strong>
            <p><?= $record->record_info; ?></p>
        </div>
<?
}

}
