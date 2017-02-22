<?php

namespace frontend\modules\cytology\models;

use Yii;
use frontend\modules\cytology\models\LibCytoType;

/**
 * This is the model class for table "cyto_in".
 *
 * @property integer $ref
 * @property string $cn
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $fullname
 * @property string $pid
 * @property string $pttype
 * @property integer $age
 * @property string $address
 * @property string $clinic_ward
 * @property string $cn_date
 * @property integer $cyto_type
 * @property integer $smear_type
 * @property string $specimen
 * @property integer $adequacy
 * @property integer $cause
 * @property integer $price
 * @property integer $result_level
 * @property string $result1
 * @property string $result2
 * @property string $result3
 * @property string $result4
 * @property string $result_detail
 * @property string $comment
 * @property integer $cytist1
 * @property integer $cytist2
 * @property string $result_date
 * @property string $last_updated
 */
class CytoIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cyto_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['cn'], 'required'],
            [['ref','age', 'cyto_type', 'smear_type', 'adequacy', 'cause', 'price', 'result_level', 'cytist1', 'cytist2'], 'integer'],
            [['cn_date', 'result_date', 'last_updated'], 'safe'],
            [['cn', 'specimen','result1', 'result2', 'result3', 'result4',], 'string', 'max' => 10],
            [['hn', 'vn', 'an'], 'string', 'max' => 8],
            [['fullname'], 'string', 'max' => 200],
            [['pid'], 'string', 'max' => 13],
            [['pttype', 'clinic_ward'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 400],
            [['result_detail', 'comment'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ref' => 'Ref',
            'cn' => 'Cn',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'an' => 'An',
            'fullname' => 'ชื่อ-สกุล',
            'pid' => 'เลขประจำตัวบัตรประชาชน',
            'pttype' => 'สิทธิการรักษา',
            'age' => 'อายุ(ปี)',
            'address' => 'ที่อยู่',
            'clinic_ward' => 'ห้องตรวจ/หอผู้ป่วย',
            'cn_date' => 'วันที่ลงทะเบียน',
            'cyto_type' => 'Cyto Type',
            'smear_type' => 'Smear Type',
            'specimen' => 'Specimen',
            'adequacy' => 'Adequacy of Specimen',
            'cause' => 'สาเหตุ',
            'price' => 'ราคา',
            'result_level' => 'ระดับความรุนแรง',
            'result1' => 'ผลตรวจ 1',
            'result2' => 'ผลตรวจ 2',
            'result3' => 'ผลตรวจ 3',
            'result4' => 'ผลตรวจ 4',
            'result_detail' => 'บันทึกผลการตรวจ',
            'comment' => 'Comment',
            'cytist1' => 'ผู้อ่านผล 1',
            'cytist2' => 'ผู้อ่านผล 2',
            'result_date' => 'วันที่ลงผล',
            'last_updated' => 'Last Updated',
        ];
    }

    /**
     * @inheritdoc
     * @return CytoInQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CytoInQuery(get_called_class());
    }

    public function getCytoType() {
        return @$this->hasOne(LibCytoType::className(), ['code' => 'cyto_type']);
    }

    public function getCytotypeName() {
        return @$this->cytoType->name;
    }
}
