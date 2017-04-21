<?php

namespace frontend\modules\pathology\models;

use Yii;
use frontend\modules\pathology\models\Paydetail;

/**
 * This is the model class for table "patho".
 *
 * @property integer $ref
 * @property string $patho_no
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $pid
 * @property string $date
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property integer $age
 * @property string $date_dx
 * @property string $result
 * @property double $price
 * @property double $paid
 * @property integer $pttype
 * @property integer $type
 * @property string $dep
 * @property string $dep_name
 * @property integer $ward
 * @property string $ward_name
 * @property string $hosp
 * @property string $hosp_name
 * @property integer $isresult
 * @property double $routine
 * @property double $frozen
 * @property double $special
 * @property double $immuno
 * @property integer $patho1
 * @property integer $patho2
 */
class Patho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patho';
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
            [['date', 'date_dx'], 'safe'],
            [['age', 'pttype', 'type', 'ward', 'isresult', 'patho1', 'patho2'], 'integer'],
            [['price', 'paid', 'routine', 'frozen', 'special', 'immuno'], 'number'],
            [['patho_no', 'hn', 'vn', 'an', 'dep'], 'string', 'max' => 10],
            [['pid'], 'string', 'max' => 13],
            [['title'], 'string', 'max' => 40],
            [['name', 'surname', 'result', 'dep_name', 'ward_name', 'hosp_name'], 'string', 'max' => 500],
            [['hosp'], 'string', 'max' => 6],
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
            'vn' => 'Vn',
            'an' => 'An',
            'pid' => 'เลขประจำตัวประชาชน',
            'date' => 'วันที่ลงทะเบียน',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'age' => 'อายุ',
            'date_dx' => 'Date Dx',
            'result' => 'Result',
            'price' => 'Price',
            'paid' => 'Paid',
            'pttype' => 'สิทธิการรักษา',
            'type' => 'ประเภทผู้ป่วย',
            'dep' => 'ห้องตรวจ',
            'dep_name' => 'ชื่อกลุ่มงาน',
            'ward' => 'หอผู้ป่วย',
            'ward_name' => 'ชื่อหอผู้ป่วย',
            'hosp' => 'โรงพยาบาล',
            'hosp_name' => 'ชื่อโรงพยาบาล',
            'isresult' => 'Isresult',
            'routine' => 'Routine',
            'frozen' => 'Frozen',
            'special' => 'Special',
            'immuno' => 'Immuno',
            'patho1' => 'Patologist',
            'patho2' => 'ผู้บันทึกผล',
        ];
    }

    /**
     * @inheritdoc
     * @return PathoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PathoQuery(get_called_class());
    }

}
