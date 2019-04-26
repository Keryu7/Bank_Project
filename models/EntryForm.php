<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $lastName;

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Please, Enter your Name'],
            [['lastName'], 'required', 'message' => 'Please, Enter your Last Name'],
            [['email'], 'required', 'message' => 'Please, Enter your Email'],
            ['email', 'email'],
        ];
    }
}