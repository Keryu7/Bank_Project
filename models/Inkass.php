<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inkass".
 *
 * @property int $id_inkass
 * @property string $amount_inkass
 * @property string $date_inkass
 * @property int $id_atm
 * @property int $id_user
 *
 * @property Bankatm $atm
 * @property Users $user
 */
class Inkass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inkass';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount_inkass', 'date_inkass', 'id_atm', 'id_user'], 'required'],
            [['date_inkass'], 'safe'],
            [['id_atm', 'id_user'], 'integer'],
            [['amount_inkass'], 'string', 'max' => 255],
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
            'id_inkass' => 'Id Inkass',
            'amount_inkass' => 'Загружено, руб',
            'date_inkass' => 'Дата инкассации',
            'id_atm' => 'Номер банкомата',
            'id_user' => 'Оператор',
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
