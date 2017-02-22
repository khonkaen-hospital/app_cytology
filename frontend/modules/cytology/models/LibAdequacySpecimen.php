<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_adequacy_specimen".
 *
 * @property integer $ref
 * @property string $code
 * @property string $name
 */
class LibAdequacySpecimen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_adequacy_specimen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 100],
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
     * @return LibAdequacySpecimenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibAdequacySpecimenQuery(get_called_class());
    }
}
