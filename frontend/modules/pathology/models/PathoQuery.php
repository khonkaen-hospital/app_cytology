<?php

namespace frontend\modules\pathology\models;

/**
 * This is the ActiveQuery class for [[Patho]].
 *
 * @see Patho
 */
class PathoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Patho[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Patho|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
