<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "soft".
 *
 * @property int $id_soft
 * @property string $soft_name
 *
 * @property Model[] $models
 */
class Soft extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'soft';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['soft_name'], 'required'],
            [['soft_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_soft' => 'Id ПО',
            'soft_name' => 'Наименование ПО',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Model::className(), ['id_soft' => 'id_soft']);
    }
}
