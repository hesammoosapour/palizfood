<?php //$form=$this->beginWidget('CActiveForm', array(
//    'id'=>'topic-form',
//    'enableAjaxValidation'=>false,
//    'htmlOptions' => array('enctype' => 'multipart/form-data'), // ADD THIS
//)); ?>
<!---->
<?php //echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
<!---->


<?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($uploadModel, 'name[]')->fileInput(['multiple' => 'multiple', 'accept' => 'image/*']) ?>
    <div class="form-group">
<!--        --><?//= \yii\bootstrap\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=\yii\bootstrap\Html::submitButton('Add',['class' =>'btn btn-primary' ])?>
    </div>
<?php \yii\bootstrap\ActiveForm::end(); ?>