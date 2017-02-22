<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_result".
 *
 * @property integer $ref
 * @property string $code
 * @property string $result
 * @property integer $class
 */
class LibResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class'], 'integer'],
            [['code'], 'string', 'max' => 3],
            [['result'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'code' => 'Code',
            'result' => 'Result',
            'class' => 'Class',
        ];
    }

    /**
     * @inheritdoc
     * @return LibResultQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibResultQuery(get_called_class());
    }
}
