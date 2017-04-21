<?php

namespace frontend\modules\pathology\models;

/**
 * This is the ActiveQuery class for [[Paydetail]].
 *
 * @see Paydetail
 */
class PaydetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Paydetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Paydetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
