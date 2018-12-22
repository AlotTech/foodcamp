<?php

namespace frontend\controllers;

use yii\data\Pagination;
use backend\modules\mdata\models\Etnis;

use backend\modules\mdata\models\VwFcamp;
use backend\modules\mdata\models\DetailKuliner;
use backend\modules\mdata\models\Kuliner;
use Yii;
class DetailController extends \yii\web\Controller
{


public $layout='main2';

 public function actionIndex()
{
	# code...
	 $query = Etnis::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('nama')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
}

public function actionDet(){
       $model =   Etnis::find();;

   return $this->render('det', [
            'model' => $model
        ]);
    }


    public function actionView($id){
       $model =   Etnis::findOne($id);

       return $this->render('view', ['model' => $model]);
    }

    public function actionKuliner(){
       $model =  VwFcamp::find();
     $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $model->count(),
        ]);

    //    $countries =  $model->listKuliner($daerah,$halal,$jenis,$limit,$ofset)
        //$model->orderBy('kuliner')
        //    ->offset($pagination->offset)
         //   ->limit($pagination->limit)
        //    ->all();
    return $this->render('kuliner', [
       //     'countries' => $countries,
        'models'=>$model,
            'pagination' => $pagination]
        );
    }


    public function actionViewkl($id){
       $model =   Kuliner::findOne($id);
       $detail = DetailKuliner::find()
        ->where(['kuliner_id' => $model->id])
        ->one();
       return $this->render('viewkl', ['model' => $model,'detail'=>$detail]);
    }
}
?>