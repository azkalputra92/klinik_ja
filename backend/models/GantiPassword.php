<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class GantiPassword extends Model
{

    public $password;
    public $password_old;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_old', 'password_repeat'], 'required'],
            [['password', 'password_old'], 'required'],
            [['password', 'password_old'], 'string', 'min' => 6],
            [['password_old'], 'cariPassword'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false, 'message' => "Password Tidak Sama", 'on' => 'ubah_password'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'password' => 'Password Baru ',
            'password_old' => 'Password Lama',
            'password_repeat' => 'Ulang Password',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function gantiPassword($id)
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::findOne(['id' => $id]);
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save(false);

        return true;
    }

    public function cariPassword($attribute, $params)
    {
        $user =  User::findOne(['username' => Yii::$app->user->identity->username]);
        if (!Yii::$app->security->validatePassword($this->password_old, $user->password_hash)) {
            $this->addError($attribute, 'Password Lama Tidak Valid.');
        }
    }
}
