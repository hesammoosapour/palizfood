<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-schedule-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput()->hiddenInput() ?>

    <?= $form->field($model, 'day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'closetime')->textInput() ?>

    <?= $form->field($model, 'opentime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
