<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!--div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('localhost:8082/foodcamp/frontend/web/logo.png') ?>
            </div>
            <div class="pull-left info">
                <p>Alot Tech</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div-->

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu ', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
                    ['label' => 'Provinsi', 'icon' => 'dashboard', 'url' => ['/mdata/provinsi']],
                    ['label' => 'Etnis', 'icon' => 'dashboard', 'url' => ['/mdata/etnis']],
                    ['label' => 'Kuliner', 'icon' => 'dashboard', 'url' => ['/mdata/kuliner']],
                    ['label' => 'Store', 'icon' => 'dashboard', 'url' => ['/mdata/store']],
                    ['label' => 'Store-Kuliner', 'icon' => 'dashboard', 'url' => ['/mdata/store-kuliner']],
                    ['label' => 'Rating', 'icon' => 'dashboard', 'url' => ['/mdata/rating-kuliner']],
                    ['label' => 'Login', 'url' => ['/user/login'], 'visible' => Yii::$app->user->isGuest],
                    /*[
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>

</aside>
