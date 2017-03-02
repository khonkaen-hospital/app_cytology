<?php

namespace frontend\modules\cytology\models;

use Yii;

/**
 * This is the model class for table "lib_hospcode".
 *
 * @property string $maincode
 * @property string $name
 * @property string $deptcode
 * @property string $deptname
 * @property string $typecode
 * @property string $typename
 * @property string $bed
 * @property string $areacode
 * @property string $areaname
 * @property string $status
 * @property string $statusname
 * @property string $address
 * @property string $postcode
 * @property string $tel
 * @property string $fax
 * @property string $gps_lat
 * @property string $gps_lon
 * @property string $service_level
 * @property string $service_type
 * @property string $servicecode
 * @property string $on_service
 * @property string $code_change
 * @property string $name_change
 * @property string $history
 * @property string $init_date
 * @property string $cancel_date
 * @property string $open_date
 * @property string $close_date
 * @property string $lastupdate
 * @property string $code5
 * @property string $off_id
 * @property string $changwat
 * @property string $ampur
 * @property string $tambon
 * @property string $moo
 */
class LibHospcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_hospcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['init_date', 'cancel_date', 'open_date', 'close_date', 'lastupdate'], 'safe'],
            [['code5', 'off_id'], 'required'],
            [['maincode', 'deptcode', 'areacode', 'servicecode'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 140],
            [['deptname'], 'string', 'max' => 60],
            [['typecode'], 'string', 'max' => 6],
            [['typename'], 'string', 'max' => 50],
            [['bed', 'off_id'], 'string', 'max' => 5],
            [['areaname'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 4],
            [['statusname'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 120],
            [['postcode'], 'string', 'max' => 62],
            [['tel', 'name_change'], 'string', 'max' => 40],
            [['fax'], 'string', 'max' => 35],
            [['gps_lat', 'gps_lon', 'service_type'], 'string', 'max' => 30],
            [['service_level'], 'string', 'max' => 15],
            [['on_service', 'code_change'], 'string', 'max' => 20],
            [['history'], 'string', 'max' => 200],
            [['code5'], 'string', 'max' => 9],
            [['changwat', 'ampur', 'tambon', 'moo'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'maincode' => 'Maincode',
            'name' => 'Name',
            'deptcode' => 'Deptcode',
            'deptname' => 'Deptname',
            'typecode' => 'Typecode',
            'typename' => 'Typename',
            'bed' => 'Bed',
            'areacode' => 'Areacode',
            'areaname' => 'Areaname',
            'status' => 'Status',
            'statusname' => 'Statusname',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'tel' => 'Tel',
            'fax' => 'Fax',
            'gps_lat' => 'Gps Lat',
            'gps_lon' => 'Gps Lon',
            'service_level' => 'Service Level',
            'service_type' => 'Service Type',
            'servicecode' => 'Servicecode',
            'on_service' => 'On Service',
            'code_change' => 'Code Change',
            'name_change' => 'Name Change',
            'history' => 'History',
            'init_date' => 'Init Date',
            'cancel_date' => 'Cancel Date',
            'open_date' => 'Open Date',
            'close_date' => 'Close Date',
            'lastupdate' => 'Lastupdate',
            'code5' => 'Code5',
            'off_id' => 'Off ID',
            'changwat' => 'Changwat',
            'ampur' => 'Ampur',
            'tambon' => 'Tambon',
            'moo' => 'Moo',
        ];
    }

    /**
     * @inheritdoc
     * @return LibHospcodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibHospcodeQuery(get_called_class());
    }
}
