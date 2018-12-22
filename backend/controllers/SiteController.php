<?php
namespace backend\controllers;

use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\KulinerSearch;
use backend\modules\mdata\models\Store;
use backend\modules\mdata\models\StoreSearch;
use common\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'view2'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KulinerSearch;
        $dataProvider = $searchModel->searchNonActiveKuliner(Yii::$app->request->getQueryParams());
        $searchModel2 = new StoreSearch;
        $dataProvider2 = $searchModel2->searchNonActiveStore(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'dataProvider2' => $dataProvider2,
            'searchModel2' => $searchModel2,
        ]);
    }

    /**
     * Displays a single Kuliner model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$modelKuliner = $this->findModel($id);
        $modelKuliner = Kuliner::find()->where(['id' => $id])->one();
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

        return $this->render('@backend/modules/mdata/views/kuliner/view', [
            'modelKuliner' => $modelKuliner,
            'modelsDetail' => (empty($modelsDetail)) ? [new DetailKuliner] : $modelsDetail,
        ]);
    }

     /**
     * Displays a single Store model.
     * @param integer $id
     * @return mixed
     */
    public function actionView2($id)
    {
        $modelStore = Store::find()->where(['id' => $id])->one();
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

        return $this->render('@backend/modules/mdata/views/store/view', [
            'modelStore' => $modelStore,
            'modelsHour' => (empty($modelsHour)) ? [new JamBuka] : $modelsHour,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = '//main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
