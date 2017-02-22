<?php

namespace frontend\modules\cytology\models;

/**
 * This is the ActiveQuery class for [[LibAdequacySpecimen]].
 *
 * @see LibAdequacySpecimen
 */
class LibAdequacySpecimenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LibAdequacySpecimen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LibAdequacySpecimen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
