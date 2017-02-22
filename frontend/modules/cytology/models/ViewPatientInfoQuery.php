<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[ViewPatientInfo]].
 *
 * @see ViewPatientInfo
 */
class ViewPatientInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ViewPatientInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ViewPatientInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
