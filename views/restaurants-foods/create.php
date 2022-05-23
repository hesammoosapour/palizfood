<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RestaurantsFoods */

$this->title = Yii::t('app', 'Create Restaurants Foods');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants Foods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-foods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
