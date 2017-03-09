<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "view_patient_info_out".
 *
 * @property integer $ref
 * @property string $cn
 * @property string $fullname
 * @property string $pid
 * @property integer $age
 * @property string $address
 * @property integer $pttype
 * @property string $pttype_name
 * @property integer $cyto_type
 * @property string $cytotype_name
 * @property integer $hospcode
 * @property string $hospname
 * @property integer $price
 * @property string $result1
 * @property string $r1_detail
 * @property string $result2
 * @property string $r2_detail
 * @property string $result3
 * @property string $r3_detail
 * @property string $result4
 * @property string $r4_detail
 * @property string $result_detail
 * @property integer $result_level
 */
class ViewPatientInfoOut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_patient_info_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'age', 'pttype', 'cyto_type', 'hospcode', 'price', 'result_level'], 'integer'],
            [['cn'], 'required'],
            [['cn'], 'string', 'max' => 10],
            [['fullname'], 'string', 'max' => 25],
            [['pid'], 'string', 'max' => 13],
            [['address', 'result_detail'], 'string', 'max' => 500],
            [['pttype_name', 'cytotype_name'], 'string', 'max' => 100],
            [['hospname'], 'string', 'max' => 140],
            [['result1', 'result2', 'result3', 'result4'], 'string', 'max' => 11],
            [['r1_detail', 'r2_detail', 'r3_detail', 'r4_detail'], 'string', 'max' => 200],
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
            'fullname' => 'Fullname',
            'pid' => 'Pid',
            'age' => 'Age',
            'address' => 'Address',
            'pttype' => 'Pttype',
            'pttype_name' => 'Pttype Name',
            'cyto_type' => 'Cyto Type',
            'cytotype_name' => 'Cytotype Name',
            'hospcode' => 'Hospcode',
            'hospname' => 'Hospname',
            'price' => 'Price',
            'result1' => 'Result1',
            'r1_detail' => 'R1 Detail',
            'result2' => 'Result2',
            'r2_detail' => 'R2 Detail',
            'result3' => 'Result3',
            'r3_detail' => 'R3 Detail',
            'result4' => 'Result4',
            'r4_detail' => 'R4 Detail',
            'result_detail' => 'Result Detail',
            'result_level' => 'Result Level',
        ];
    }

    /**
     * @inheritdoc
     * @return ViewPatientInfoOutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViewPatientInfoOutQuery(get_called_class());
    }
}
