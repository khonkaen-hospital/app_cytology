<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $ref
 * @property string $code
 * @property string $abbr
 * @property string $name
 * @property string $name2
 * @property string $name_full
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        // return 'address';
        return '{{%address%}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref'], 'integer'],
            [['code'], 'string', 'max' => 6],
            [['abbr'], 'string', 'max' => 50],
            [['name', 'name2'], 'string', 'max' => 100],
            [['name_full'], 'string', 'max' => 220],
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
            'abbr' => 'Abbr',
            'name' => 'Name',
            'name2' => 'Name2',
            'name_full' => 'Name Full',
        ];
    }

    /**
     * @inheritdoc
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
