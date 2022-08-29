<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<h1>Клиент</h1>

<?php

$form = ActiveForm::begin() ?>
 <?= $form->field($model, 'username', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Логин</span>{input}</div>',
    ])->label(false)->error(false); ?>    
  <?= $form->field($model, 'role', [   'inputTemplate' => '
                    <div class=input-group >  <span class="input-group-addon" id="basic-addon3">Роль</span>{input}</div>',
    ])->label(false)->error(false); ?>    

  

   <div class="form-group"> 
       <div class="col-lg-offset-5 col-lg-7"> 
            <?= Html::submitButton('Сохранить',['class' => 'btn btn-success']) ?>
            </div>  </div>
<?php ActiveForm::end() ?>
<a href="index.php?r=site%2Fadmin2">
<button class="btn btn-primary">Назад</button> </a>