<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RestaurantsComments */

$this->title = Yii::t('app', 'Create Restaurants Comments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Restaurants Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
