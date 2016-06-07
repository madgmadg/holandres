<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\components\Evento1;
use common\components\Evento2;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'eventos', 'eventouno', 'eventodos'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionEventos(){
        return $this->render('eventos');
    }

    public function actionEventouno(){
        $event = New Evento1;
        //first clear session, so our event will set message in this session variable
        Yii::$app->session->set('eventMessage', null);
 
        //attach event handler, 'genericEventHandlerFunction' is the name of global function with accepting one argument $event
        $event->on(Evento1::EVENTO_UNO, function($event){
            Yii::$app->session->set('eventMessage', $event->data);
        },'Dispara Evento 1');
        
        //this function will trigger event
        $event->Event();  

        return $this->render('event');
    }

    public function actionEventodos(){
        $event = New Evento2;
        //first clear session, so our event will set message in this session variable
        Yii::$app->session->set('eventMessage', null);
 
        //attach event handler, 'genericEventHandlerFunction' is the name of global function with accepting one argument $event
        $event->on(Evento2::EVENTO_DOS, function($event){
            Yii::$app->session->set('eventMessage', $event->data);
        },'Dispara Evento 2');
        
        //this function will trigger event
        $event->Event();  

        return $this->render('event');
    }
}
