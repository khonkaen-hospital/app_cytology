<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_adequacy".
 *
 * @property integer $ref
 * @property integer $code
 * @property string $name
 */
class LibAdequacy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_adequacy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
            [['name'], 'string', 'max' => 70],
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
            'name' => 'Name',
        ];
    }

    /**
     * @inheritdoc
     * @return LibAdequacyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibAdequacyQuery(get_called_class());
    }
}
