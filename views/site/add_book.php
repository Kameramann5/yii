<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<h1>Книга</h1>

<?php

$form = ActiveForm::begin() ?>
 <?= $form->field($model, 'name', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Наименование</span>{input}</div>',
    ])->label(false)->error(false); ?>    
  <?= $form->field($model, 'author', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Автор</span>{input}</div>',
    ])->label(false)->error(false); ?>   
 <?= $form->field($model, 'сhapter', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Раздел</span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'date', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Дата издания</span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'reader', [   'inputTemplate' => '
                    <div class=input-group style="display:none">  <span class="input-group-addon" id="basic-addon3"></span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'tel', [   'inputTemplate' => '
                    <div class=input-group style="display:none">  <span class="input-group-addon" id="basic-addon3"></span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'status', [   'inputTemplate' => '
                    <div class=input-group style="display:none">  <span class="input-group-addon" id="basic-addon3"></span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'enddate', [   'inputTemplate' => '
                    <div class=input-group style="display:none">  <span class="input-group-addon" id="basic-addon3"></span>{input}</div>',
    ])->label(false)->error(false); ?>  
     <?= $form->field($model, 'begindate', [   'inputTemplate' => '
                    <div class=input-group style="display:none">  <span class="input-group-addon" id="basic-addon3"></span>{input}</div>',
    ])->label(false)->error(false); ?>  

  
   


   <div class="form-group"> 
       <div class="col-lg-offset-5 col-lg-7"> 
        
            <?= Html::submitButton('Добавить',['class' => 'btn btn-success']) ?>
            </div>  </div>
<?php ActiveForm::end() ?>
<a href="index.php?r=site%2Fadmin">
<button class="btn btn-primary">Назад</button> </a>