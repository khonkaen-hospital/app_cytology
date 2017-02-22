<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[CytoOut]].
 *
 * @see CytoOut
 */
class CytoOutQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CytoOut[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CytoOut|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
