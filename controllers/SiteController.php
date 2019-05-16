<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\users;

use app\models\SignupForm;


class SiteController extends Controller
{

    /*public function beforeAction($action) {
        if(Yii::$app->user->isGuest && $action->id != 'login' && $action->id != 'signup')
            $this->redirect(array('site/login'));
        if(!Yii::$app->user->isGuest && $action->id != 'login' && $action->id != 'signup')
            $this->redirect(array('bankatm/index'));
        return true;
    }*/

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
        //$this->layout = $this->setting['layout'];
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /*'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],*/
            'captcha' => [

                'class' => 'developit\captcha\CaptchaAction',

                'type' => 'numbers', // 'numbers', 'letters' or 'default' (contains numbers & letters)

                'minLength' => 4,

                'maxLength' => 4,

            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('bankatm/index'));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(array('bankatm/index'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
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
        return $this->render('about');
    }

    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('bankatm/index'));
        }

        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new users();
            $user->username = $model->username;
            $user->lastname = $model->lastname;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->role = $model->role;
            if($user->save()){
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }

}



