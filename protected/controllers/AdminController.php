<?php

/**
 * Class AdminController
 * Контроллер для панели администратора
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 29.05.17
 */
class AdminController extends GoController
{
    /**
     * Фильтры
     *
     * @return array
     */
    public function filters()
    {
        return [
            'ajaxOnly + unactive',
        ];
    }

    /**
     * Страница со статистикой по заявкам
     */
    public function actionIndex($id = null, $actual = null)
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->createUrl('admin/login'));
        }

        $model = new Appointments();
        $modelName = get_class($model);

        if ($id !== null && $actual !== null) {
            $model->updateActual($id, $actual);
        }

        $this->render(
            'index',
            ['model' => $model, 'modelName' => $modelName,
                'dataProvider' => $model->find()->search()]
        );
    }

    /**
     * Страница входа в админку
     */
    public function actionLogin()
    {
        $model = new LoginForm;
        $modelName = get_class($model);

        if (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];

            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->createUrl('admin/index'));
            }
        }

        $this->render('login', ['model' => $model, 'modelName' => $modelName]);
    }

    /**
     * Выход из админки
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('admin/login'));
    }
}
