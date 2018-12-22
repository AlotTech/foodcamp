<?php

namespace backend\modules\mdata\controllers;

use backend\modules\mdata\models\JamBuka;
use backend\modules\mdata\models\Model;
use backend\modules\mdata\models\Store;
use backend\modules\mdata\models\StoreSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class StoreController extends Controller
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
     * Lists all Store models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StoreSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Store model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelStore = $this->findModel($id);
        $modelsHour = $modelStore->jamBukas;
        $currentPhoto = $modelStore->foto;

        if ($modelStore->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsHour, 'store_id', 'id');
            $modelsHour = Model::createMultiple(JamBuka::classname(), $modelsHour);
            Model::loadMultiple($modelsHour, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsHour, 'store_id', 'id')));

            // validate all models
            $valid = $modelStore->validate();
            $valid = Model::validateMultiple($modelsHour) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $photo = UploadedFile::getInstance($modelStore, "foto");
                    if (!empty($photo) && $photo->size != 0) {
                        $hashphoto = md5($photo->baseName . date('YmdHms'));
                        $photo->saveAs(Yii::getAlias('@backend') . '/web/uploads/store/' . $hashphoto . '.' . $photo->extension);
                        $modelStore->foto = $hashphoto . '.' . $photo->extension;
                    } else {
                        $modelStore->foto = $currentPhoto;
                    }
                    if ($flag = $modelStore->save(false)) {
                        if (!empty($deletedIDs)) {
                            JamBuka::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsHour as $index => $modelHour) {
                            $modelHour->store_id = $modelStore->id;
                            if (!($flag = $modelHour->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelStore->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('view', [
            'modelStore' => $modelStore,
            'modelsHour' => (empty($modelsHour)) ? [new JamBuka] : $modelsHour,
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelStore = new Store;
        $modelsHour = [new JamBuka];

        if ($modelStore->load(Yii::$app->request->post())) {
            $modelStore->user_id = Yii::$app->user->identity->id;
            $modelsHour = Model::createMultiple(JamBuka::classname());
            Model::loadMultiple($modelsHour, Yii::$app->request->post());
    
            // validate all models
            $valid = $modelStore->validate();
            //$valid = Model::validateMultiple($modelsHour) && $valid;
            //die(print_r($modelsHour));

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if (!empty($photo) && $photo->size != 0) {
                        $photo = UploadedFile::getInstance($modelStore, 'foto');
                        $hashphoto = md5($photo->baseName . date('YmdHms'));
                        $photo->saveAs(Yii::getAlias('@backend') . '/web/uploads/store/' . $hashphoto . '.' . $photo->extension);
                        $modelStore->foto = $hashphoto . '.' . $photo->extension;
                    }
                    if ($flag = $modelStore->save(false)) {
                        foreach ($modelsHour as $modelHour) {
                            $modelHour->store_id = $modelStore->id;
                            if (!($flag = $modelHour->save(false))) {
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
            'modelStore' => $modelStore,
            'modelsHour' => (empty($modelsHour)) ? [new JamBuka] : $modelsHour,
        ]);
    }

    /**
     * Updates an existing Store model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Store model.
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
     * Finds the Store model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Store the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Store::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
