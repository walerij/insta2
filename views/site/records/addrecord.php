<?php

use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]);
?>
<?= $form->field($model, 'file')->fileInput(); ?>
<?= $form->field($model, 'info')->textarea(); ?>

    <button>Добавить</button>

<?php ActiveForm::end(); ?>
