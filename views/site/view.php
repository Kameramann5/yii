<?php 
use yii\widgets\DetailView;
?>
<h1>Клиент</h1>
<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',  
        'username'
        ,  
        'role'                           // creation date formatted as datetime
    ],
]);

?>
<a href="index.php?r=site%2Fadmin2">
<button class="btn btn-primary">Назад</button> </a>