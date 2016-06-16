<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CountForm;
use app\models\Products;
use app\models\ProductCriteria;


class SiteController extends Controller
{
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

    public function actionIndex()

    {
       $modelCount = new CountForm();
       $modelContact = new ContactForm();
       // $products = Products::getAllProducts();

       if ($modelCount->load(Yii::$app->request->post())) {
        if ($modelCount->validate()) {
            $products = $_POST['CountForm']['products'];
            $markets = $_POST['CountForm']['markets'];
            $criteria = $_POST['CountForm']['criteria'];



            return $this->render('about', [
                'userdata' => $_POST,
                ]);
            return;
        }
    }
    return $this->render('index', [
        'modelCount' => $modelCount,
        'modelContact' => $modelContact,
        ]);
}

public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->goBack();
    }
    return $this->render('login', [
        'model' => $model,
        ]);
}

public function actionLogout()
{
    Yii::$app->user->logout();

    return $this->goHome();
}

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


public function actionCounts()
{
    $model = new CountForm();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('counts', [
        'model' => $model,
        ]);
}

public function actionAbout()
{
    return $this->render('about1');
}
}
