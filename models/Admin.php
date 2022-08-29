<?php

namespace app\models;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord 
{
    
public function attributeLabels() {
    return [
'id'=>'Код',
'username'=>'Логин'

    ];
}
//без правил обновление данных работать не будет!
//здесь их нет, потому что они в файле models/User.php 17 строка

}