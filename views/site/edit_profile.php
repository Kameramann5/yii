<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('app', 'Профиль');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'tel',
        ],
    ]) ?>
 
 <?php $form = ActiveForm::begin(); ?>
 <?= $form->field($model, 'username', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Логин</span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'tel', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Телефон</span>{input}</div>',
    ])->label(false)->error(false); ?>      

 <div class="form-group">
     <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
 </div>

 <?php ActiveForm::end(); ?>
</div>
