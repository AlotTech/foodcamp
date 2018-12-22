    <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>

               
   <section class="content">

            <section class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                            <form class="form clearfix">
                                <div class="form-group">
                                                     

                                    <?= $form->field($model, 'username') ?>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="email" class="col-form-label required">Email</label>
                                     <?= $form->field($model, 'email') ?>

                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password" class="col-form-label required">Password</label>
                                    
                                   <?= $form->field($model, 'password')->passwordInput() ?>
                                </div>
                            
                                <!--end form-group-->
                                <div class="d-flex justify-content-between align-items-baseline">
                                   

         <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>
                                   aa
                                </div>
                            </form>
                            <hr>
                            <p>
                                By clicking "Register" button, you agree with our <a href="#" class="link">Terms & Conditions.</a>
                            </p>
                        </div>
                        <!--end col-md-6-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>