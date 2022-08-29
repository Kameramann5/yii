<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('app', 'Просмотр Книги');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
        'name',
        'author',
        'сhapter',
        'date',
       
            
        ],
    ]) ?>
 
</div>
<a href="index.php?r=site%2Fbook_my">
<button class="btn btn-primary">Назад</button> </a>