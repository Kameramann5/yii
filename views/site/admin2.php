<?php

use yii\grid\GridView;

$this->title = 'Все клиенты';
$this->params['breadcrumbs'][] = $this->title;
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        'id',
        'username',
        ['class' => 'yii\grid\ActionColumn']
    ]
]);
?>
<a href="index.php?r=site%2Fadmin">
<button class="btn btn-primary">Назад</button> </a>