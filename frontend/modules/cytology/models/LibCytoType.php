<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_cyto_type".
 *
 * @property integer $code
 * @property string $name
 * @property integer $price
 */
class LibCytoType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_cyto_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'price' => 'Price',
        ];
    }

    /**
     * @inheritdoc
     * @return LibCytoTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibCytoTypeQuery(get_called_class());
    }
}
