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
use app\models\Markets;
use app\models\ProductCriteria;
use yii\web\Session;


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
       $modelCount = new CountForm(['scenario' => 'some_scenario']);
       $modelContact = new ContactForm();

//      $session = new Session;
// $session->open();
// $session['send'] = false;
       // $products = Products::getAllProducts();


       if ($modelContact->load(Yii::$app->request->post()) && $modelContact->contact(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('contactFormSubmitted');
        // $session['send'] = 'true';

        return $this->refresh();
    }

    if ($modelCount->load(Yii::$app->request->post())) {
        if ($modelCount->validate()) {
            $products = $_POST['CountForm']['products'];
            $markets = $_POST['CountForm']['markets'];
            $criteria = $_POST['CountForm']['criteria'];

            $userdata0 = $modelCount->compositeReviews(Products::getProductReviews($products, $criteria), Markets::getMarketReviews($markets, $criteria)); 

            $userdata1 = $modelCount->getThereshold($userdata0);

            $userdata2 = $modelCount->applyThereshold($userdata0, $userdata1);

            // $userdata1 = Products::getProductReviews($products, $criteria);

             // $userdata2 = Markets::getMarketReviews($markets, $criteria);
            return $this->render('about1', [
                'userdata0' => $userdata0,
                'userdata1' => $userdata1,
                'userdata2' => $userdata2,
                'products' => $products,
                'markets' => $markets,
                'criteria' => $criteria,
                // 'send' => $session['send'],
                ]);
        }
    }
    return $this->render('index', [
        'modelCount' => $modelCount,
        'modelContact' => $modelContact,
        ]);
}


protected function performAjaxValidation($model)
{
    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
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
            $products = $_POST['CountForm']['products'];
            $markets = $_POST['CountForm']['markets'];
            $criteria = $_POST['CountForm']['criteria'];



            return $this->render('index', [
                'userdata' => $_POST,
                ]);
            
        }
    }

    return $this->render('_counts', [
        'model' => $model,
        ]);
}

public function actionAbout()
{
    return $this->render('about1');
}
}
