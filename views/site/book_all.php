<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Книги</p>
    <table class="table"> <tr><th>id</th><th>Наименование</th><th>Автор</th><th>Раздел</th><th>Дата издания</th><th>Читатель</th><th>Телефон читателя</th><th>Дата выдачи</th><th>Статус</th> 
    <?php foreach($books as $book) {  if (empty($book['reader'])) { echo '<th></th>'; ?>
  
    <?php  } }  ?>
</tr>
<?php 
foreach($books as $book) {
echo "<tr><td>{$book['id']}</td><td>{$book['name']}</td><td>{$book['author']}</td><td>{$book['сhapter']}</td><td>{$book['date']}</td><td>{$book['reader']}</td><td>{$book['tel']}</td><td>{$book['begindate']}</td><td>{$book['status']}</td>

"; ?>
<?php  if (empty($book['reader'] or $book['status'] )) {  ?><fieldset><td>
<?= Html::a('Взять', ['request','value' => ($book->id)], ['class'=>'btn btn-primary']) ;?>
</td></fieldset>
<?php  }   ?>
<?php echo "
</tr>";
} ?>

</table>
<?php //print_r($books); ?>
    <?php   
    
//print_r(Yii::$app->user->identity) ?>

      


</div>
