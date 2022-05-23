<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarketPhotos */

$this->title = Yii::t('app', 'Create Market Photos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Market Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
