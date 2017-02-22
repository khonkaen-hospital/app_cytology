<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_smear_type".
 *
 * @property integer $code
 * @property string $name
 */
class LibSmearType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_smear_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
        ];
    }

    /**
     * @inheritdoc
     * @return LibSmearTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibSmearTypeQuery(get_called_class());
    }
}
