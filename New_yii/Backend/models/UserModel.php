<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Login;

/**
 * LoginUserSearch represents the model behind the search form of `app\models\Login`.
 */
class UserModel extends Login
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age', 'phone_number'], 'integer'],
            [['firstname', 'lastname', 'email', 'password', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Login User
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function checkUser($email,$pass)
    {
        $user = (new \yii\db\Query())
                ->select('*')
                ->from('login')
                ->where(['email'=>$email,'password'=>$pass])
                ->one();
        return $user;
    }

    /**
     * Register user
     */
    public function registerUser($firstname,$lastname,$email,$pass,$age,$address,$phonenumber)
    {
        $user=Yii::$app->db->createCommand()
              ->insert('login', [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $pass,
            'age' => $age,
            'address' => $address,
            'phone_number' => $phonenumber,
            ])->execute();
       return $user;
    }

}
