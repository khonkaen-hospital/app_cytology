<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_cytist".
 *
 * @property integer $code
 * @property string $name
 * @property string $position
 * @property string $expired
 */
class LibCytist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_cytist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
            [['expired'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['position'], 'string', 'max' => 30],
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
            'position' => 'Position',
            'expired' => 'Expired',
        ];
    }

    /**
     * @inheritdoc
     * @return LibCytistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibCytistQuery(get_called_class());
    }
}
