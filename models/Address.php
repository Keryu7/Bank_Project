<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id_address
 * @property string $region
 * @property string $address
 *
 * @property Address $address0
 * @property Address $address1
 * @property Bankatm[] $bankatms
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region'], 'string'],
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['id_address' => 'id_address']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_address' => 'Id Address',
            'region' => 'Region',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress0()
    {
        return $this->hasOne(Address::className(), ['id_address' => 'id_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress1()
    {
        return $this->hasOne(Address::className(), ['id_address' => 'id_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankatms()
    {
        return $this->hasMany(Bankatm::className(), ['id_address' => 'id_address']);
    }
}
