<?php

/**
 * Class SiteController
 * Контроллер для формы записи
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class SiteController extends GoController
{
    /**
     * Форма записи
     */
    public function actionIndex()
    {
        $model = new AppointmentForm();
        $modelName = get_class($model);
        $result = '';
        if (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];
            $model->phone = preg_replace('/[^0-9]*/', '', $model->phone);

            if ($model->validate()) {
                $dbTable = new Appointments();
                $dbTable->setAttributes($model->attributes);
                if ($dbTable->save() !== false) {
                    unset($_POST);
                    $result = 'success';
                } else {
                    $result = 'error';
                }
            }
        }

        $this->render(
            'index',
            ['model' => $model, 'modelName' => $modelName, 'result' => $result]
        );
    }

    /**
     * Действие при исключениях и ошибках
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $this->render('error', $error);
        }
    }
}
