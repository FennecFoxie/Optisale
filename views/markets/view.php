<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Markets */

$this->title = $model->idMarket;
$this->params['breadcrumbs'][] = ['label' => 'Markets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idMarket], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idMarket], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMarket',
            'marketName',
        ],
    ]) ?>

</div>
