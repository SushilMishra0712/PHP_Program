<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property int $age
 * @property string $address
 * @property int $phone_number
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'password', 'age', 'address', 'phone_number'], 'required'],
            [['age', 'phone_number'], 'integer'],
            [['firstname', 'lastname', 'email', 'password'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
        ];
    }
}
