<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modelatm".
 *
 * @property int $id_model
 * @property string $model_name
 * @property int $id_soft
 *
 * @property Bankatm[] $bankatms
 * @property Soft $soft
 */
class Modelatm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modelatm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_name', 'id_soft'], 'required'],
            [['id_soft'], 'integer'],
            [['model_name'], 'string', 'max' => 255],
            [['id_soft'], 'exist', 'skipOnError' => true, 'targetClass' => Soft::className(), 'targetAttribute' => ['id_soft' => 'id_soft']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_model' => 'Id Model',
            'model_name' => 'Model Name',
            'id_soft' => 'Id Soft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankatms()
    {
        return $this->hasMany(Bankatm::className(), ['id_model' => 'id_model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoft()
    {
        return $this->hasOne(Soft::className(), ['id_soft' => 'id_soft']);
    }
}
