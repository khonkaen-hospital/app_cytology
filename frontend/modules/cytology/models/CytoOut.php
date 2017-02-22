<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "cyto_out".
 *
 * @property integer $ref
 * @property string $cn
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $pid
 * @property integer $pttype
 * @property integer $hospcode
 * @property string $address
 * @property integer $cyto_type
 * @property integer $smear_type
 * @property integer $specimen
 * @property integer $adecuacy
 * @property integer $cause
 * @property integer $price
 * @property integer $result_level
 * @property integer $result1
 * @property integer $result2
 * @property integer $result3
 * @property integer $result4
 * @property string $result_detail
 * @property string $comment
 * @property integer $cytist1
 * @property integer $cytist2
 * @property string $result_date
 * @property string $last_updated
 */
class CytoOut extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['cn'], 'required'],
            [['pttype', 'hospcode', 'cyto_type', 'smear_type', 'specimen', 'adecuacy', 'cause', 'price', 'result_level', 'result1', 'result2', 'result3', 'result4', 'cytist1', 'cytist2'], 'integer'],
            [['result_date', 'last_updated'], 'safe'],
            [['cn'], 'string', 'max' => 10],
            [['title', 'name', 'surname'], 'string', 'max' => 8],
            [['pid'], 'string', 'max' => 13],
            [['address', 'result_detail', 'comment'], 'string', 'max' => 500],
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
            'title' => 'Title',
            'name' => 'Name',
            'surname' => 'Surname',
            'pid' => 'Pid',
            'pttype' => 'Pttype',
            'hospcode' => 'Hospcode',
            'address' => 'Address',
            'cyto_type' => 'Cyto Type',
            'smear_type' => 'Smear Type',
            'specimen' => 'Specimen',
            'adecuacy' => 'Adecuacy',
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
}
