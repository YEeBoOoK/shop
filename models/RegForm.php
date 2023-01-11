<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegForm extends User
{
    public $confirm_password;
    public $agree;

    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password','confirm_password','agree'], 'required'],
            [['name', 'surname', 'patronymic'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{2,}/u', 'message'=>'Используйте минимум 2 русские буквы'],
            [['login','password'], 'match', 'pattern' => '/^[A-Za-z0-9]{5,}/u', 'message'=>'Используйте минимум 5 латинских букв и цифр'],
            [['confirm_password'], 'compare', 'compareAttribute'=>'password', 'message'=>'Пароли не совпадают'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
            [['email'], 'email'],
            [['is_admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 100],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'is_admin' => 'Is Admin',
            'confirm_password' => 'Повторите пароль',
            'agree' => 'Подтвердите согласие на обработку данных',
        ];
    }
}