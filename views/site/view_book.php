<?php 
use yii\widgets\DetailView;
?>
<h1>Книга</h1>
<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'author',
        'сhapter',
        'date',
        'reader',
        'tel',
        'begindate',
      
        'status',
    ],
]);

?>
<a href="index.php?r=site%2Fadmin">
<button class="btn btn-primary">Назад</button> </a>