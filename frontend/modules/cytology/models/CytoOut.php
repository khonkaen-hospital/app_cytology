<?php

namespace frontend\modules\cytology\models;

use Yii;

use common\behaviors\AttributeValueBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "cyto_out".
 *
 * @property integer $ref
 * @property string $cn
 * @property string $cn_date
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $birthdate
 * @property integer $age
 * @property string $pid
 * @property integer $pid_flag
 * @property integer $pttype
 * @property string $pttype_name
 * @property integer $requester
 * @property integer $hospcode
 * @property string $hospname
 * @property string $address
 * @property string $tambol
 * @property string $amp
 * @property string $prov
 * @property integer $cyto_type
 * @property integer $smear_type
 * @property integer $specimen
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
class CytoOut extends \yii\db\ActiveRecord
{

    use \frontend\modules\cytology\traits\ItemsAliasTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cyto_out';
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
            ActiveRecord::EVENT_BEFORE_INSERT => ['birthdate','cn_date','result_date'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['birthdate','cn_date','result_date'],
            ],
            'value' => function ($event, $attribute) {
                return $this->convertDatebeforesave($this->owner->$attribute);
            },
          ],
          [
            'class' => AttributeValueBehavior::className(),
            'attributes' => [
            ActiveRecord::EVENT_AFTER_FIND => ['birthdate','cn_date','result_date'],
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
            //[['cn'], 'required'],
            [['cn_date', 'birthdate', 'result_date', 'last_updated'], 'safe'],
            [['age', 'pid_flag', 'pttype', 'requester', 'hospcode', 'cyto_type', 'smear_type', 'specimen', 'adequacy', 'cause', 'price', 'result_level', 'cytist1', 'cytist2'], 'integer'],
            [['cn'], 'string', 'max' => 10],
            [['title', 'name', 'surname'], 'string', 'max' => 8],
            [['pid'], 'string'],
            [['pttype_name', 'hospname'], 'string', 'max' => 100],
            [['address', 'result_detail', 'comment'], 'string', 'max' => 500],
            [['tambol', 'amp', 'prov'], 'string', 'max' => 2],
            [['result1', 'result2', 'result3', 'result4'], 'string', 'max' => 11],
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
            'cn_date' => 'Cn Date',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'birthdate' => 'วันเกิด',
            'age' => 'อายุ',
            'pid' => 'เลขที่บัตรประชาชน',
            'pid_flag' => 'ไม่มีเลขที่บัตรประชาชน',
            'pttype' => 'สิทธิการรักษา',
            'pttype_name' => 'Pttype Name',
            'requester' => 'Requester',
            'hospcode' => 'สถานพยาบาล',
            'hospname' => 'Hospname',
            'address' => 'ที่อยู่',
            'tambol' => 'ตำบล',
            'amp' => 'อำเภอ',
            'prov' => 'จังหวัด',
            'cyto_type' => 'Cyto Type',
            'smear_type' => 'Smear Type',
            'specimen' => 'Specimen',
            'adequacy' => 'Adequacy',
            'cause' => 'Cause',
            'price' => 'Price',
            'result_level' => 'Result Level',
            'result1' => 'Result1',
            'result2' => 'Result2',
            'result3' => 'Result3',
            'result4' => 'Result4',
            'result_detail' => 'Result Detail',
            'comment' => 'Comment',
            'cytist1' => 'Cytist1',
            'cytist2' => 'Cytist2',
            'result_date' => 'Result Date',
            'last_updated' => 'Last Updated',
        ];
    }

    /**
     * @inheritdoc
     * @return CytoOutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CytoOutQuery(get_called_class());
    }

    public function loadInitAddress($id, $type)
  {
      return Address::find()->loadInit($id, $type)->column();
  }

    public function getRendomKey($lenght=13)
     {
         return uniqid(mt_rand(), true);
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
