<?php
/**
 * @var $this SiteController
 * @var $model AppointmentForm
 * @var $modelName string
 * @var $form CActiveForm
 * @var $result string
 */

$this->pageTitle=Yii::app()->name;

if (!empty($_POST[$modelName])) {
    $post = $_POST[$modelName];
}

$form=$this->beginWidget(
    'GoActiveForm', [
    'id' => $modelName,
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
    'htmlOptions' => ['class' => 'form-horizontal']
    ]
);

if ($form->errorSummary($model)) {
    echo $form->errorSummary($model, '<div class="alert alert-danger">', '</div>');
}

if ($result === 'success') {
    echo '<div class="alert alert-success">Ваша заявка принята. '
        .'Наши консультанты свяжуться с вами в ближайшее время</div>';
} elseif ($result === 'error') {
    echo '<div class="alert alert-warning">При оформлении заявки произошла ошибка. '
        .'Попробуйте ещё раз.</div>';
}
?>

    <h1>Оформить заявку на приём к врачу</h1>
    <div class="form-group  col-lg-12">
        <label for=<?= $modelName; ?>"_name">Имя</label>
        <?php
        $value = !empty($post['name']) ? $post['name'] : '';
        echo $form->textField(
            $model, 'name',
            ['class' => 'form-control', 'placeholder' => 'Пожалуйста введите ваше имя',
                'value' => $value]
        ); ?>
    </div>
    <div class="form-group col-lg-12">
        <label for=<?= $modelName; ?>"_lastName">Фамилия</label>
        <?php
        $value = !empty($post['lastName']) ? $post['lastName'] : '';
        echo $form->textField(
            $model, 'lastName',
            ['class' => 'form-control', 'placeholder' => 'Пожалуйста введите вашу фамилию',
                'value' => $value]
        ); ?>
    </div>
    <div class="form-group">
        <div class="col-lg-5">
            <label for=<?= $modelName; ?>"_phone">Телефон</label>
            <?php
            $value = !empty($post['phone']) ? $post['phone'] : '';
            echo $form->textField(
                $model, 'phone',
                ['class' => 'form-control',
                    'placeholder' => 'Пожалуйста укажите ваш телефон для связи',
                    'value' => $value]
            ); ?>
        </div>
        <div class="col-lg-6">
            <label for=<?= $modelName; ?>"_email">E-mail</label>
            <?php
            $value = !empty($post['email']) ? $post['email'] : '';
            echo $form->textField(
                $model, 'email',
                ['class' => 'form-control', 'placeholder' => 'Пожалуйста введите ваш email для связи',
                    'value' => $value]
            ); ?>
        </div>
    </div>
    <div class="form-group col-lg-12">
        <label for=<?= $modelName; ?>"_datetime">Дата и время приёма</label>
        <?php
        $value = !empty($post['datetime']) ? $post['datetime'] : '';
        echo $form->textField(
            $model, 'datetime',
            ['class' => 'form-control datepick', 'placeholder' => 'Пожалуйста выберите дату и время приёма',
                'value' => $value]
        ); ?>
    </div>
    <br>
    <div class="col-lg-2">
        <?= CHtml::submitButton('Записаться', ['class' => 'btn btn-success']); ?>
    </div>

<?php $this->endWidget(); ?>