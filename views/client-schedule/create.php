<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClientSchedule */

$this->title = Yii::t('app', 'Create Client Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Client Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-schedule-create">

    <?php  foreach ( $businesses as $business ) {
        echo "<a href='create?name=".$business ['name']."'>"
            .$business ['name']
            ."</a>";
    }?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
