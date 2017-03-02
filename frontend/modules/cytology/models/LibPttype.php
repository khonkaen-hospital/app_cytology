<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_pttype".
 *
 * @property integer $code
 * @property string $text
 * @property integer $free
 * @property string $class
 * @property string $standard
 * @property string $standard2
 * @property string $insclass
 * @property integer $withcode
 * @property string $unitcost
 */
class LibPttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_pttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'insclass'], 'required'],
            [['code', 'free', 'withcode'], 'integer'],
            [['text'], 'string', 'max' => 100],
            [['class', 'standard', 'standard2', 'insclass'], 'string', 'max' => 10],
            [['unitcost'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'text' => 'Text',
            'free' => 'Free',
            'class' => 'Class',
            'standard' => 'Standard',
            'standard2' => 'Standard2',
            'insclass' => 'Insclass',
            'withcode' => 'Withcode',
            'unitcost' => 'Unitcost',
        ];
    }

    /**
     * @inheritdoc
     * @return LibPttypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibPttypeQuery(get_called_class());
    }
}
