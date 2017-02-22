<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibCytoType]].
 *
 * @see LibCytoType
 */
class LibCytoTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibCytoType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibCytoType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
