<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Da\User\Widget\ConnectWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View            $this
 * @var \Da\User\Form\LoginForm $model
 * @var \Da\User\Module         $module
 */

$this->title = Yii::t('usuario', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@app/views/user/shared/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= \yii\helpers\Url::home() ?>">Thermo<b>Control</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            <?= \Yii::t('app', 'Sign in to start your session'); ?>
        </p>
        <?php $form = ActiveForm::begin(
            [
                'id'                     => $model->formName(),
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
            ]
        ) ?>

        <?= $form->field(
            $model,
            'login',
            [
                'inputOptions' => [
                    'class'       => 'form-control',
                    'tabindex'    => '1',
                    'placeholder' => Yii::t('usuario', 'E-mail'),
                ],
                'options'      => ['class' => 'form-group has-feedback'],
            ]
        )->label(false) ?>
        <?= $form
            ->field(
                $model,
                'password',
                [
                    'inputOptions' => [
                        'class'       => 'form-control',
                        'tabindex'    => '2',
                        'placeholder' => Yii::t('usuario', 'Password'),
                    ],
                    'options'      => ['class' => 'form-group has-feedback'],
                ]
            )
            ->passwordInput()
            ->label(false) ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="checkbox">
                    <?= $form->field(
                        $model,
                        'rememberMe',
                        [
                            'template' => '{input}',
                            'options'  => [
                                'tag' => false,
                            ],
                        ]
                    )->checkbox(['tabindex' => '4'])->label(false) ?>
                </div>
            </div>


            <div class="col-xs-12">
                <?= Html::submitButton(
                    Yii::t('usuario', 'Sign in'),
                    ['class' => 'btn bg-purple btn-block', 'tabindex' => '3']
                ) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <?php if ($module->allowPasswordRecovery): ?>
            <p>
                <a href="<?= \yii\helpers\Url::to(['/user/recovery/request']) ?>">
                    <?= Yii::t('usuario', 'Forgot password?') ?>
                </a>
            </p>
        <?php endif; ?>
        <?php if ($module->enableRegistration): ?>
            <p>
                <?= Html::a(Yii::t('usuario', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableEmailConfirmation): ?>
            <p>
                <?= Html::a(
                    Yii::t('usuario', 'Didn\'t receive confirmation message?'),
                    ['/user/registration/resend']
                ) ?>
            </p>
        <?php endif ?>

    </div>
</div>