<?php
namespace frontend\controllers;

use backend\modules\mdata\models\DetailKuliner;
use backend\modules\mdata\models\JamBuka;
use backend\modules\mdata\models\Kuliner;
use backend\modules\mdata\models\Model;

use backend\modules\mdata\models\StoreKuliner;
use backend\modules\mdata\models\Store;
use backend\modules\mdata\models\VwFcamp;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\web\UploadedFile;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup', 'home', 'list','maps'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */

   public function actionMaps()
    {
       
         $this->layout = "form";
            return $this->render('maps');
        
    }
    public function actionIndex()
    {
        if (Yii::$app->request->get('submit') === 'list') {
            $this->layout = "home";
            $model = VwFcamp::find();
            $pagination = new Pagination([
                'defaultPageSize' => 4,
                'totalCount' => $model->count(),
            ]);
            return $this->render('list', [
                'models' => $model,
                'pagination' => $pagination,
            ]);
        } else {
            $this->layout = "home";
            $model = VwFcamp::find();
            $pagination = new Pagination([
                'defaultPageSize' => 4,
                'totalCount' => $model->count(),
            ]);
            return $this->render('home', [
                'models' => $model,
                'pagination' => $pagination,
            ]);
        }
    }

    public function actionList()
    {
        $this->layout = "home";
        $model = VwFcamp::find();
        $pagination = new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $model->count(),
        ]);
        return $this->render('list', [
            'models' => $model,
            'pagination' => $pagination,
        ]);
    }

    public function actionDetail($id)
    {
        $this->layout = "home";
        $model = Kuliner::findOne($id);
        $dtkuliner = DetailKuliner::find()
            ->where(['kuliner_id' => $model->id])
            ->one();
       $storeKuliner = StoreKuliner::find()
            ->where(['kuliner_id' => $model->id])
            ->all();


        return $this->render('detail', [
            'model' => $model,
            'dtkuliner' => $dtkuliner,
            'store'=>$storeKuliner,
        ]);
    }

    public function actionAddKuliner()
    {
        $this->layout = "form";
          $modelKuliner = new Kuliner;
        $modelsDetail = [new DetailKuliner];

        if ($modelKuliner->load(Yii::$app->request->post())) {
            $modelKuliner->user_id = Yii::$app->user->identity->id;
            $modelsDetail = Model::createMultiple(DetailKuliner::classname());
            Model::loadMultiple($modelsDetail, Yii::$app->request->post());

         
                foreach ($modelsDetail as $index => $modelDetail) {
                    $photo = UploadedFile::getInstance($modelDetail, "[{$index}]foto");
                       if (!empty($photo) && $photo->size != 0) {
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

        return $this->render('_form_kuliner', [
            'modelKuliner' => $modelKuliner,
            'modelsDetail' => (empty($modelsDetail)) ? [new DetailKuliner] : $modelsDetail,
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddStore()
    {
        $this->layout = "form";
        $modelStore = new Store;
        $modelsHour = [new JamBuka];

        if ($modelStore->load(Yii::$app->request->post())) {
            $modelStore->user_id = Yii::$app->user->identity->id;
            //$modelStore->user_id = 1;
            $modelsHour = Model::createMultiple(JamBuka::classname());
            Model::loadMultiple($modelsHour, Yii::$app->request->post());

            // validate all models
            $valid = $modelStore->validate();
            //$valid = Model::validateMultiple($modelsHour) && $valid;
            //die(print_r($modelStore));

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    
                        $photo = UploadedFile::getInstance($modelStore, 'foto');
                    if (!empty($photo) && $photo->size != 0) {
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

        return $this->render('_form_store', [
            'modelStore' => $modelStore,
            'modelsHour' => (empty($modelsHour)) ? [new JamBuka] : $modelsHour,
        ]);
    }

    public function actionKuliner()
    {
        $model = VwFcamp::find();
        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $model->count(),
        ]);

        //$countries =  $model->listKuliner($daerah,$halal,$jenis,$limit,$ofset)
        //$model->orderBy('kuliner')
        //->offset($pagination->offset)
        //->limit($pagination->limit)
        //->all();
        return $this->render('kuliner', [
            'models' => $model,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
