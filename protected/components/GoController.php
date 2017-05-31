<?php

/**
 * Class GoController
 * Расширения для класса CController
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class GoController extends CController
{
    /**
     * @var string the default layout for the controller view.
     */
    public $layout='//layouts/main';
    /**
     * @var array context menu items.
     */
    public $menu=[];
    /**
     * @var array the breadcrumbs of the current page.
     */
    public $breadcrumbs=[];

    /**
     * Возврат на главную страницу
     */
    public function returnToIndex()
    {
        $this->redirect(Yii::app()->createUrl('/site/index'));
    }
}
