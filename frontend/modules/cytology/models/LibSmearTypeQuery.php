<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibSmearType]].
 *
 * @see LibSmearType
 */
class LibSmearTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibSmearType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibSmearType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
