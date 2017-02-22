<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[CytoIn]].
 *
 * @see CytoIn
 */
class CytoInQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CytoIn[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CytoIn|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
