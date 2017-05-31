<?php
/**
 * @var $this SiteController
 * @var $model LoginForm
 * @var $modelName string
 * @var $form GoActiveForm
 */

$this->pageTitle = Yii::app()->name . ' - Панель администратора';
?>

<h1>Панель администратора</h1>

<p>Для входа по умолчанию используйте данные admin / admin</p>

<div class="login-form">
<?php $form = $this->beginWidget(
    'GoActiveForm', [
        'id' => $modelName,
        'enableClientValidation' => true,
        'clientOptions' => ['validateOnSubmit' => true]
]);

if ($form->errorSummary($model)) {
    echo $form->errorSummary($model, '<div class="alert alert-danger">', '</div>');
}
?>
    <div class="form-group  col-lg-4">
        <label for=<?= $modelName; ?>"_username">Логин</label>
        <?php
        echo $form->textField(
            $model, 'username',
            ['class' => 'form-control', 'placeholder' => 'Пожалуйста введите логин']
        ); ?>
    </div>
    <div class="form-group col-lg-4">
        <label for=<?= $modelName; ?>"_password">Пароль</label>
        <?php
        echo $form->passwordField(
            $model, 'password',
            ['class' => 'form-control', 'placeholder' => 'Пожалуйста введите пароль']
        ); ?>
    </div>
    <div class="form-group col-lg-12">
        <div class="col-lg-4">
            <?= CHtml::submitButton('Войти', ['class' => 'btn btn-success']); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
