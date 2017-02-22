<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibSpecimen]].
 *
 * @see LibSpecimen
 */
class LibSpecimenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibSpecimen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibSpecimen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
