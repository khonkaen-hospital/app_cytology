<?php

namespace frontend\modules\pathology\models;

use Yii;
use frontend\modules\pathology\models\Patho;

/**
 * This is the model class for table "paydetail".
 *
 * @property integer $ref
 * @property integer $patho_no
 * @property integer $patho_ref
 * @property string $hn
 * @property integer $p_type
 * @property integer $r1
 * @property double $r1_cost
 * @property string $r1_detail
 * @property integer $r2
 * @property double $r2_cost
 * @property string $r2_detail
 * @property integer $r3
 * @property double $r3_cost
 * @property string $r3_detail
 * @property integer $s1
 * @property double $s1_cost
 * @property string $s1_detail
 * @property integer $s2
 * @property double $s2_cost
 * @property string $s2_detail
 * @property integer $s3
 * @property double $s3_cost
 * @property string $s3_detail
 * @property integer $i1
 * @property double $i1_cost
 * @property string $i1_detail
 * @property integer $i2
 * @property double $i2_cost
 * @property string $i2_detail
 * @property integer $i3
 * @property double $i3_cost
 * @property string $i3_detail
 * @property integer $f1
 * @property double $f1_cost
 * @property string $f1_detail
 * @property integer $f2
 * @property double $f2_cost
 * @property string $f2_detail
 * @property integer $f3
 * @property double $f3_cost
 * @property string $f3_detail
 * @property double $total
 */
class Paydetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paydetail';
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
            [['patho_ref','patho_no', 'p_type', 'r1', 'r2', 'r3', 's1', 's2', 's3', 'i1', 'i2', 'i3', 'f1', 'f2', 'f3'], 'integer'],
            [['r1_cost', 'r2_cost', 'r3_cost', 's1_cost', 's2_cost', 's3_cost', 'i1_cost', 'i2_cost', 'i3_cost', 'f1_cost', 'f2_cost', 'f3_cost', 'total'], 'number'],
            [['hn'], 'string', 'max' => 10],
            [['r1_detail', 'r2_detail', 'r3_detail', 's1_detail', 's2_detail', 's3_detail', 'i1_detail', 'i2_detail', 'i3_detail', 'f1_detail', 'f2_detail', 'f3_detail'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'patho_ref' => 'Patho ref',
            'patho_no' => 'Patho No',
            'hn' => 'Hn',
            'p_type' => 'P Type',
            'r1' => 'R1',
            'r1_cost' => 'ราคา',
            'r1_detail' => 'รายละเอียด',
            'r2' => 'R2',
            'r2_cost' => 'ราคา',
            'r2_detail' => 'รายละเอียด',
            'r3' => 'R3',
            'r3_cost' => 'ราคา',
            'r3_detail' => 'รายละเอียด',
            's1' => 'S1',
            's1_cost' => 'ราคา',
            's1_detail' => 'รายละเอียด',
            's2' => 'S2',
            's2_cost' => 'ราคา',
            's2_detail' => 'รายละเอียด',
            's3' => 'S3',
            's3_cost' => 'ราคา',
            's3_detail' => 'รายละเอียด',
            'i1' => 'I1',
            'i1_cost' => 'ราคา',
            'i1_detail' => 'รายละเอียด',
            'i2' => 'I2',
            'i2_cost' => 'ราคา',
            'i2_detail' => 'รายละเอียด',
            'i3' => 'I3',
            'i3_cost' => 'ราคา',
            'i3_detail' => 'รายละเอียด',
            'f1' => 'F1',
            'f1_cost' => 'ราคา',
            'f1_detail' => 'รายละเอียด',
            'f2' => 'F2',
            'f2_cost' => 'ราคา',
            'f2_detail' => 'รายละเอียด',
            'f3' => 'F3',
            'f3_cost' => 'ราคา',
            'f3_detail' => 'รายละเอียด',
            'total' => 'รวม',
        ];
    }

    /**
     * @inheritdoc
     * @return PaydetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaydetailQuery(get_called_class());
    }


}
