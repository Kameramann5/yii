<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Мои Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

   


    <?php   ?>
 
    <?php   ?>
  
    <?php    ?>
</tr>
   <?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        
        'id',
        'name',
        'author',
        'сhapter',
        'date',
        'begindate',
        
        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'update' => function ($url) {
                 
                },
                'delete' => function ($url) {
                 
                },
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    return '/web/index.php?r=site%2Fview_book_my&id=' . $model->id;
                }
              
            }
        ],
        [ 
            'class' => 'yii\grid\ActionColumn',
            'template' => '{check}',
            'buttons' => [
                'check' => function ($url, $model) {
                
                     
                    return Html::a('<button class="btn btn-danger">Вернуть</button>', ['requestno', 'value' => $model->id]);
                
                },
            ],
        ],
        
    ]
]); ?>
<?php //print_r($books); ?>
    <?php   
    
//print_r(Yii::$app->user->identity) ?>

      


</div>
