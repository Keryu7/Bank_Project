<?php
namespace app\models;
use yii\base\Model;
use yii;

class SignupForm extends Model{

    public $username;
    public $password;
    public $lastname;

    public function rules()
    {
        return [
            [['username'], 'required', 'message'=>Yii::t('app', 'Введите Ваше имя')],
            [['lastname'], 'required', 'message' => 'Введите Вашу Фамилию'],
            [['password'], 'required', 'message' => 'Введите пароль'],
            ['lastname', 'unique', 'targetClass' => users::className(),  'message' => 'Это имя уже занят'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Имя',
            'password' => 'Пароль',
            'lastname' => 'Фамилия',
        ];
    }
    public static function tableName()
    {
        return 'users';
    }
}