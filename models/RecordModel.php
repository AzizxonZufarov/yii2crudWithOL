<?php
namespace app\models;

use yii\behaviors\OptimisticLockBehavior;
use yii\db\ActiveRecord;

class RecordModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'records';
    }

    public function behaviors()
    {
        return [
            OptimisticLockBehavior::class,
        ];
    }

    public function optimisticLock()
    {
        return 'version';
    }

    public function rules()
    {
        return [
            [ ['title', 'priority'], 'required'],
            [ ['title', 'priority'], 'trim'],
        ];
    }
}