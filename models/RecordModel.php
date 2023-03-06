<?php
namespace app\models;

use yii\behaviors\OptimisticLockBehavior;
use yii\db\ActiveRecord;

class RecordModel extends ActiveRecord
{
    public $permitValue = null;

    public static function tableName()
    {
        return 'records';
    }

    public function behaviors()
    {
        return [
            [
                'class' => OptimisticLockBehavior::class,
                'value' => $this->permitValue
            ],
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
            ['permitValue', 'safe'],
            ['version', 'integer']
        ];
    }
}