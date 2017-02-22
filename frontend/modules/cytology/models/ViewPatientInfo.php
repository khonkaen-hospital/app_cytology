<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "view_patient_info".
 *
 * @property string $cn
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $fullname
 * @property string $pid
 * @property integer $age
 * @property string $address
 * @property string $pttype
 * @property integer $cyto_type
 * @property string $cytotype_name
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
class ViewPatientInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_patient_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cn'], 'required'],
            [['age', 'cyto_type', 'price', 'result_level'], 'integer'],
            [['cn'], 'string', 'max' => 10],
            [['hn', 'vn', 'an'], 'string', 'max' => 8],
            [['fullname', 'r1_detail', 'r2_detail', 'r3_detail', 'r4_detail'], 'string', 'max' => 200],
            [['pid'], 'string', 'max' => 13],
            [['address'], 'string', 'max' => 400],
            [['pttype', 'cytotype_name'], 'string', 'max' => 100],
            [['result1', 'result2', 'result3', 'result4'], 'string', 'max' => 11],
            [['result_detail'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cn' => 'Cn',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'an' => 'An',
            'fullname' => 'Fullname',
            'pid' => 'Pid',
            'age' => 'Age',
            'address' => 'Address',
            'pttype' => 'Pttype',
            'cyto_type' => 'Cyto Type',
            'cytotype_name' => 'Cytotype Name',
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
     * @return ViewPatientInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViewPatientInfoQuery(get_called_class());
    }
}
