<?php

namespace frontend\controllers;

use Yii;

use backend\modules\mdata\models\StoreSearch;
use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\KulinerSearch;
use dektrium\user\Finder;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\ResendForm;
use dektrium\user\models\User;
use dektrium\user\traits\AjaxValidationTrait;
use dektrium\user\traits\EventTrait;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
class ProfileController extends \yii\web\Controller
{


public $layout='form';

 public function actionIndex()
{

	# code...searchByusr($idk)
    
    	$model = new StoreSearch;
    	$models = $model->searchByusr(Yii::$app->user->id);
	  $searchModel = new KulinerSearch;
        $dataProvider = $searchModel->searchByuser(Yii::$app->user->id);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'models'=>$models,
        ]);
}
}
?>