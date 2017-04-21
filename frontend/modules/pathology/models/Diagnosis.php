<?php

namespace frontend\modules\pathology\models;

use Yii;

/**
 * This is the model class for table "diagnosis".
 *
 * @property integer $ref
 * @property string $patho_no
 * @property string $hn
 * @property string $date
 * @property integer $spc1
 * @property integer $spc2
 * @property integer $spc3
 * @property string $dx1
 * @property string $dx2
 * @property string $dx3
 * @property string $diagnosis
 */
class Diagnosis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnosis';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['spc1', 'spc2', 'spc3'], 'integer'],
            [['diagnosis'], 'string'],
            [['patho_no', 'hn', 'dx1', 'dx2', 'dx3'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'patho_no' => 'Patho No',
            'hn' => 'Hn',
            'date' => 'Date',
            'spc1' => 'Spc1',
            'spc2' => 'Spc2',
            'spc3' => 'Spc3',
            'dx1' => 'Dx1',
            'dx2' => 'Dx2',
            'dx3' => 'Dx3',
            'diagnosis' => 'Diagnosis',
        ];
    }

    /**
     * @inheritdoc
     * @return DiagnosisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiagnosisQuery(get_called_class());
    }
}
