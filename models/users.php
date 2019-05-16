<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class users extends ActiveRecord implements IdentityInterface
{
    /*private $id;
    private $username;
    private $password;
    private $authKey;
    private $accessToken;
    private $lastname;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];*/

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    /*public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }*/

    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'lastname' => 'Фамилия',
            'role' => 'Должность',
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    /*public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }*/

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }



    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    /*public function validatePassword($password)
    {
        return $this->password === $password;
    }*/

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $role = $_POST['SignupForm']['role'];

        if ($role == 'engineer') {
            $auth = \Yii::$app->authManager;
            $editor = $auth->getRole('repair'); // Получаем роль editor
            $auth->assign($editor, $this->id); // Назначаем пользователю, которому принадлежит модель User
        } else {
            $auth = \Yii::$app->authManager;
            $editor = $auth->getRole('inkass'); // Получаем роль editor
            $auth->assign($editor, $this->id);
        }
    }
}