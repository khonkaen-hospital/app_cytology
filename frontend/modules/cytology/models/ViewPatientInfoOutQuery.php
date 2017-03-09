<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[ViewPatientInfoOut]].
 *
 * @see ViewPatientInfoOut
 */
class ViewPatientInfoOutQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ViewPatientInfoOut[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ViewPatientInfoOut|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
