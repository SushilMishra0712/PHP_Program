<?php
namespace app\controllers;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Auth-Token, X-PINGOTHER, Content-Type,X-Requested-With,Access-Control-Allow-Origin');
header('Access-Control-Max-Age: 86400');
header('Content-Type: application/json');

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LoginUserSearch;
use app\models\UserModel;
require_once '../models/RabbitMq.php';

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
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT','GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['X-Wsse'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
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
        $postdata=file_get_contents("php://input");
        $postdata=json_decode($postdata,true);
        
            $email =$postdata['email'];
            $pass =$postdata['password'];
    
            $check = new UserModel();
            $result = $check->checkUser($email,$pass);
            $data=json_encode($postdata);
           
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
     * ForgotPassword action.
     *
     * @return Response|string
     */
    public function actionForgot()
    {
        $data= Yii::$app->request->post();
        $postdata=file_get_contents("php://input");
        $postdata=json_decode($postdata,true);
        
            $email =$postdata['email'];
    
            $check = new UserModel();
            $result = $check->checkEmail($email);
            $data=json_encode($postdata);
           
            if($result)
            {    
                // Successfull response
                return \Yii::createObject([
                    'class' => 'yii\web\Response',
                    'format' => \yii\web\Response::FORMAT_JSON,
                    'data' => [
                        'message' => 'Account exists',
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
                        'message' => 'Account does not exists',
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
        $postdata=file_get_contents("php://input");
        $postdata=json_decode($postdata,true);
        
        $firstname =$postdata['firstname'];
        $lastname = $postdata['lastname'];
        $email = $postdata['email'];
        $pass = $postdata['password'];
        $age = $postdata['age'];
        $address = $postdata['address'];
        $phonenumber = $postdata['phone_number'];

        $check = new UserModel();
        $result = $check->registerUser($firstname,$lastname,$email,$pass,$age,$address,$phonenumber);
        
        if($result)
        {
            $subject="Verify Mail";
            $body="";
            RabbitMq::addRabbit($email,$subject,$body);
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
