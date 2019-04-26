<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bankatm".
 *
 * @property int $id_atm
 * @property int $id_model
 * @property int $id_address
 *
 * @property Address $address
 * @property Modelatm $modelatm
 * @property Inkass[] $inkasses
 * @property Repair[] $repairs
 */
class Bankatm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bankatm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_atm', 'id_model', 'id_address', 'address.region'], 'required'],
            [['id_atm', 'id_model', 'id_address', 'address.region'], 'integer'],
            [['id_atm'], 'unique'],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['id_address' => 'id_address']],
            [['id_model'], 'exist', 'skipOnError' => true, 'targetClass' => Modelatm::className(), 'targetAttribute' => ['id_model' => 'id_model']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_atm' => 'Номер банкомата',
            'id_model' => 'Модель',
            'id_address' => 'Адрес',
            'address.region' => 'Область',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id_address' => 'id_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelatm()
    {
        return $this->hasOne(Modelatm::className(), ['id_model' => 'id_model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInkasses()
    {
        return $this->hasMany(Inkass::className(), ['id_atm' => 'id_atm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['id_atm' => 'id_atm']);
    }
}
