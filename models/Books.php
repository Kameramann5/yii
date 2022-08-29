<?php 
namespace app\models;
use yii\db\ActiveRecord;
class Books extends ActiveRecord 
{
    public function attributeLabels() {
        return [
    'name'=>'Наименование',
    'author'=>'Автор',
    'сhapter'=>'Раздел',
    'date'=>'Дата издания',
    'reader'=>'Читатель',
    'tel'=>'Телефон читателя',
    'begindate'=>'Дата выдачи',
    'enddate'=>'Дата возврата',
    'status'=>'Статус',
        ];
    }
    public function rules() {
        return [
            [['name','author','сhapter','date','reader','tel','begindate','enddate','status'],'string']
        ];
    }
 }