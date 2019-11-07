<?php
namespace app\controllers;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Auth-Token, X-PINGOTHER, Content-Type,X-Requested-With,Access-Control-Allow-Origin');
// header('Access-Control-Max-Age: 86400');
// header('Content-Type: application/json');

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LoginUserSearch;
use app\models\UserModel;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    /**
     * Displays homepage.
     *
     * @return string
     */


    public function actionIndex()
    {
        echo "User Api";

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $data= Yii::$app->request->post();
        $email = $data['email'];
        $pass = $data['password'];

        $check = new UserModel();
        $result = $check->checkUser($email,$pass);
        // print_r($result['firstname']);

        if($result)
        {
            // Successfull response
            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => 'login successfull',
                    'code' => 200,
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email'],
                    // 'password' => $result['password'],
                    'age' => $result['age'],
                    'address' => $result['address'],
                    'phonenumber' => $result['phone_number'],           
                ],
            ]);
        }
        else
        {
            // Failed response
            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => 'Something is wrong',
                    'code' => 401,
                ],
            ]);
        }
    }

    /**
     * Register action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        $data= Yii::$app->request->post();
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $pass = $data['password'];
        $age = $data['age'];
        $address = $data['address'];
        $phonenumber = $data['phone_number'];

        $check = new UserModel();
        $result = $check->registerUser($firstname,$lastname,$email,$pass,$age,$address,$phonenumber);
        
        if($result)
        {
            // Successfull response
            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => 'registration successfull',
                    'code' => 200,
                ],
            ]);
        }
        else
        {
            // Failed response
            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'message' => 'Something is wrong',
                    'code' => 401,
                ],
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        echo "Its about page";
    }



}
