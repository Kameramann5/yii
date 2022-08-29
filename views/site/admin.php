<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Админка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Клиенты  </p>
    <table class="table"> <tr><th>id</th><th>Имя</th><th>Роль</th></tr>
<?php 
foreach($rows as $row) {
echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['role']}</td></tr>";
} ?>
</table>


<a href="index.php?r=site%2Fadmin2">
<button class="btn btn-primary">Управление</button> </a><br><br>
<p>Книги</p>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        
        'id',
        'name',
        'author',
        'сhapter',
        'date',
        'reader',
        'tel',
        'begindate',
        'status',
        [ 
            'class' => 'yii\grid\ActionColumn',
            'template' => '{check}',
            'buttons' => [
                'check' => function ($url, $model) {
                    if (!empty($model->reader)) {
                        if ($model->status=='На одобрении')    {   
                    return Html::a('<span class="glyphicon glyphicon-ok">Одобрить?</span>', ['requestyes', 'value' => $model->id]); }
                }
                },
            ],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{check}',
            'buttons' => [
                'check' => function ($url, $model) {
                    if (!empty($model->reader)) {
if ($model->status=='Одобрено' or $model->status=='На одобрении')    {   
                    return Html::a('<span class="glyphicon glyphicon-remove">Отказать?</span>', ['requestno', 'value' => $model->id]);
                }
                }
                    
                },
            ],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    return '/web/index.php?r=site%2Fview_book&id=' . $model->id;
                }
                if ($action === 'update') {
                    return '/web/index.php?r=site%2Fedit_book&id=' . $model->id;
                }
                if ($action === 'delete') {
                    return '/web/index.php?r=site%2Fdelete_book&id=' . $model->id;
                }
            }
        ],
       
    ]
]); echo Html::a("Добавить книгу",["add"],['class'=>'btn btn-info'])?>
    <?php   
    
//print_r(Yii::$app->user->identity) ?>
  
</div>
