<?php
namespace frontend\modules\cytology\models;
use Yii;
use frontend\modules\cytology\models\Address;
/**
 * This is the model class for table "lib_address".
 *
 * @property integer $ref
 * @property string $code
 * @property string $abbr
 * @property string $name
 * @property string $name2
 * @property string $name_full
 */
class Tambon extends Address
{
    const TYPE = 'tambon';
    public function init()
    {
        $this->type = self::TYPE;
        parent::init();
    }
    public static function find()
    {
        return new \frontend\modules\cytology\models\AddressQuery(get_called_class(), ['type' => self::TYPE]);
    }
}
