<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBackendModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Backend Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'display_name',
            'real_name',
            'password',
            'mobile',
            'login_num',
            'login_ip',
            'login_time',
            'user_group',
            'updated_by',
            'updated_at',
            'status',
            'email:email',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'role',
            'created_at',
        ],
    ]) ?>

</div>
