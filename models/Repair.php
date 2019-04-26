<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property int $id_repair
 * @property string $repair
 * @property string $date_repair
 * @property int $id_atm
 * @property int $id_user
 *
 * @property Bankatm $atm
 * @property Users $user
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['repair', 'date_repair', 'id_atm', 'id_user'], 'required'],
            [['date_repair'], 'safe'],
            [['id_atm', 'id_user'], 'integer'],
            [['repair'], 'string', 'max' => 255],
            [['id_atm'], 'exist', 'skipOnError' => true, 'targetClass' => Bankatm::className(), 'targetAttribute' => ['id_atm' => 'id_atm']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_repair' => 'Id Repair',
            'repair' => 'Repair',
            'date_repair' => 'Date Repair',
            'id_atm' => 'Id Atm',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtm()
    {
        return $this->hasOne(Bankatm::className(), ['id_atm' => 'id_atm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
