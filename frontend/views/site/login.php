<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?php echo Html::encode($this->title)?></h1>
    <p>Please fill out the following fields to login:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']);?>
                <?php echo $form->field($model, 'login')->textInput(['autofocus' => true])?>
                <?php echo $form->field($model, 'password')->passwordInput()?>
                <div class="form-group">
                    <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button'])?>
                </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
