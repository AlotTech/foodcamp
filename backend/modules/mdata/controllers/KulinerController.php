<?php

namespace backend\modules\mdata\controllers;

use backend\modules\mdata\models\DetailKuliner;
use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\KulinerSearch;
use backend\modules\mdata\models\Model;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * KulinerController implements the CRUD actions for Kuliner model.
 */
class KulinerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kuliner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KulinerSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Kuliner model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelKuliner = $this->findModel($id);
        $modelsDetail = $modelKuliner->detailKuliners;
        foreach ($modelsDetail as $photo) {
            $currentPhoto = $photo->foto;
        }

        if ($modelKuliner->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsDetail, 'kuliner_id', 'id');
            $modelsDetail = Model::createMultiple(DetailKuliner::classname(), $modelsDetail);
            Model::loadMultiple($modelsDetail, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDetail, 'kuliner_id', 'id')));

            // validate all models
            $valid = $modelKuliner->validate();
            $valid = Model::validateMultiple($modelsDetail) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelKuliner->save(false)) {
                        if (!empty($deletedIDs)) {
                            DetailKuliner::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsDetail as $index => $modelDetail) {
                            $modelDetail->kuliner_id = $modelKuliner->id;
                            $photo = UploadedFile::getInstance($modelDetail, "[{$index}]foto");
                            if (!empty($photo) && $photo->size != 0) {
                                $hashphoto = md5($photo->baseName . date('YmdHms'));
                                $photo->saveAs(Yii::getAlias('@backend') . '/web/uploads/kuliner/' . $hashphoto . '.' . $photo->extension);
                                $modelDetail->foto = $hashphoto . '.' . $photo->extension;
                            } else {
                                $modelDetail->foto = $currentPhoto;
                            }
                            if (!($flag = $modelDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelKuliner->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('view', [
            'modelKuliner' => $modelKuliner,
            'modelsDetail' => (empty($modelsDetail)) ? [new DetailKuliner] : $modelsDetail,
        ]);
    }

    /**
     * Creates a new Kuliner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $modelKuliner = new Kuliner;
        $modelsDetail = [new DetailKuliner];

        if ($modelKuliner->load(Yii::$app->request->post())) {
            $modelKuliner->user_id = Yii::$app->user->identity->id;
            $modelsDetail = Model::createMultiple(DetailKuliner::classname());
            Model::loadMultiple($modelsDetail, Yii::$app->request->post());

            if (!empty($photo) && $photo->size != 0) {
                foreach ($modelsDetail as $index => $modelDetail) {
                    $photo = UploadedFile::getInstance($modelDetail, "[{$index}]foto");
                    $hashphoto = md5($photo->baseName . date('YmdHms'));
                    $photo->saveAs(Yii::getAlias('@backend') . '/web/uploads/kuliner/' . $hashphoto . '.' . $photo->extension);
                    $modelDetail->foto = $hashphoto . '.' . $photo->extension;
                }
            }

            // validate all models
            $valid = $modelKuliner->validate();
            //$valid = Model::validateMultiple($modelsDetail) && $valid;
            //die(print_r($modelsDetail));

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelKuliner->save(false)) {
                        foreach ($modelsDetail as $index => $modelDetail) {
                            $modelDetail->kuliner_id = $modelKuliner->id;
                            if (!($flag = $modelDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelKuliner' => $modelKuliner,
            'modelsDetail' => (empty($modelsDetail)) ? [new DetailKuliner] : $modelsDetail,
        ]);
    }
    
    /**
     * Updates an existing Kuliner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
     
        $modelKuliner = $this->findModel($id);
        $modelsDetail = $modelKuliner->detailKuliners;

        if ($modelKuliner->load(Yii::$app->request->post())) {
            $modelKuliner->user_id = Yii::$app->user->identity->id;
            $modelsDetail = Model::createMultiple(DetailKuliner::classname());
            Model::loadMultiple($modelsDetail, Yii::$app->request->post());
            //die(print_r($photo));

           // if (!empty($photo) && $photo->size != 0) {
                foreach ($modelsDetail as $index => $modelDetail) {
                    $photo = UploadedFile::getInstance($modelDetail, "[{$index}]foto");
                    $hashphoto = md5($photo->baseName . date('YmdHms'));
                    $photo->saveAs(Yii::getAlias('@backend') . '/web/uploads/kuliner/' . $hashphoto . '.' . $photo->extension);
                    $modelDetail->foto = $hashphoto . '.' . $photo->extension;
                }
           // }

            // validate all models
            $valid = $modelKuliner->validate();
            //$valid = Model::validateMultiple($modelsDetail) && $valid;
            //die(print_r($modelsDetail));

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelKuliner->save(false)) {
                        foreach ($modelsDetail as $index => $modelDetail) {
                            $modelDetail->kuliner_id = $modelKuliner->id;
                            if (!($flag = $modelDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelKuliner' => $modelKuliner,
            'modelsDetail' => (empty($modelsDetail)) ? [new DetailKuliner] : $modelsDetail,
        ]);
    }

    /**
     * Deletes an existing Kuliner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kuliner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kuliner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kuliner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
