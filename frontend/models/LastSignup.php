<?php


namespace frontend\models;

use yii\base\Model;

class LastSignup extends Model{

    public $name;
    public $email;
    public $password;
    public $repeatPassword;

    public function rules()
    {
        return[
            [['name','email','password','repeatPassword'],'required','message'=>'Заполните поле'],
            ['name','match','pattern' =>'/^[a-zA-Zа-яА-Я]+$/u', 'message' => 'Используйте только буквы'],
            ['name','trim'],
            ['email', 'email', 'message' => 'Введите почту'],
            ['email','trim'],
            ['password', 'match', 'pattern' => '/^(?=.*\d)[A-Za-z\d]{6,}$/', 'message' => 'Пароль должен содержать минимум 6 символов, и цифру'],
            ['repeatPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
        ];
    }

    // public function signup()
    // {
 
    //     if (!$this->validate()) {
    //         return null;
    //     }
 
    //     $users = new Users();
    //     $users->name = $this->name;
    //     $users->email = $this->email;
    //     $users->setPassword($this->password);
    //     // $users->generateAuthKey();
    //     return $users->save() ? $users : null;
    // }

}