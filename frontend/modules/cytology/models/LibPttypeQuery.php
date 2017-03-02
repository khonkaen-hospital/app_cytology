<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibPttype]].
 *
 * @see LibPttype
 */
class LibPttypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibPttype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibPttype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
