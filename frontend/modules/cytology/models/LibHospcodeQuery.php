<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibHospcode]].
 *
 * @see LibHospcode
 */
class LibHospcodeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibHospcode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibHospcode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
