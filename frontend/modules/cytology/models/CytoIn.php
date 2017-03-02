<?php

namespace frontend\modules\cytology\models;

use Yii;

use common\behaviors\AttributeValueBehavior;
use yii\db\ActiveRecord;
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
 * @property integer $pttype
 * @property string $pttype_name
 * @property integer $age
 * @property string $address
 * @property integer $clinic
 * @property integer $ward
 * @property string $clinic_ward
 * @property string $cn_date
 * @property integer $requester
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


     public function behaviors()
    {
        return [
          [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
            ActiveRecord::EVENT_BEFORE_INSERT => ['pid'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['pid'],
            ],
            'value' => function ($event, $attribute) {
                return  str_replace('-', '', $this->owner->$attribute);
            },
          ],
          [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
            ActiveRecord::EVENT_BEFORE_INSERT => ['cn_date','result_date'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['cn_date','result_date'],
            ],
            'value' => function ($event, $attribute) {
                return $this->convertDatebeforesave($this->owner->$attribute);
            },
          ],
          [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
            ActiveRecord::EVENT_AFTER_FIND => ['cn_date','result_date'],
            ],
            'value' => function ($event, $attribute) {
                return $this->convertDatebeforeshow($this->owner->$attribute);
            },
          ],
        ];
    }

    public function rules()
    {
        return [
            // [['cn'], 'required'],
            [['pttype', 'age', 'clinic', 'ward', 'requester', 'cyto_type', 'smear_type', 'adequacy', 'cause', 'price', 'result_level', 'cytist1', 'cytist2'], 'integer'],
            [['cn_date', 'result_date', 'last_updated'], 'safe'],
            [['cn', 'specimen'], 'string', 'max' => 10],
            [['hn', 'vn', 'an'], 'string', 'max' => 8],
            [['fullname'], 'string', 'max' => 200],
            [['pid'], 'string'],
            [['pttype_name', 'clinic_ward'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 400],
            [['result1', 'result2', 'result3', 'result4'], 'string', 'max' => 11],
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
            'pttype' => 'Pttype',
            'pttype_name' => 'สิทธิการรักษา',
            'age' => 'อายุ',
            'address' => 'ที่อยู่',
            'clinic' => 'Clinic',
            'ward' => 'Ward',
            'clinic_ward' => 'ห้องตรวจ/หอผู้ป่วย',
            'cn_date' => 'วันที่ลงทะเบียน',
            'requester' => 'Requester',
            'cyto_type' => 'ประเภทการตรวจ',
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
            'result_date' => 'วันที่ลงผลการตรวจ',
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

    public function convertDatebeforesave($date){
            $originalDate = $date;
            $cn_year = (integer)(date("Y", strtotime($originalDate)))-543;
            $cn_dm = date("m-d", strtotime($originalDate));

            $cn_date = $cn_year.'-'.$cn_dm;

            return $cn_date;
    }

    public function convertDatebeforeshow($date){
            $originalDate = $date;
            $cn_year = (integer)(date("Y", strtotime($originalDate)))+543;
            $cn_dm = date("d-m", strtotime($originalDate));

            $cn_date = $cn_dm.'-'.$cn_year;

            return $cn_date;
    }
}
