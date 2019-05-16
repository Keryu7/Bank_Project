<?php
namespace app\models;
use yii\base\Model;
use yii;

class SignupForm extends Model{

    public $username;
    public $password;
    public $lastname;
    public $verifyCode;
    public $role;

    public function rules()
    {
        return [
            [['username'], 'required', 'message'=>Yii::t('app', 'Введите Ваше имя')],
            [['lastname'], 'required', 'message' => 'Введите Вашу Фамилию'],
            [['password'], 'required', 'message' => 'Введите пароль'],
            [['role'], 'required', 'message' => 'Назначьте роль'],
            ['verifyCode', 'captcha'],
            ['lastname', 'unique', 'targetClass' => users::className(),  'message' => 'Это имя уже занято'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Имя',
            'password' => 'Пароль',
            'lastname' => 'Фамилия',
            'role' => 'Должность',
            'verifyCode' => 'Проверочный код'
        ];
    }
    public static function tableName()
    {
        return 'users';
    }
}