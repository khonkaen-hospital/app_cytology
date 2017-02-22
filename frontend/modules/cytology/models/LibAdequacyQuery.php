<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibAdequacy]].
 *
 * @see LibAdequacy
 */
class LibAdequacyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibAdequacy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibAdequacy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
