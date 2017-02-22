<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibCytist]].
 *
 * @see LibCytist
 */
class LibCytistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibCytist[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibCytist|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
