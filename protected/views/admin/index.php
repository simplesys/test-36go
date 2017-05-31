<?php
/**
 * @var $this AdminController
 * @var $model Appointments
 * @var $modelName string
 * @var $form GoActiveForm
 * @var $dataProvider CActiveDataProvider
 */

$this->pageTitle = Yii::app()->name . ' - Список заявок';
?>

    <h1>Список заявок</h1>
<?php
$this->widget(
    'zii.widgets.grid.CGridView', [
        'id' => $modelName,
        'dataProvider' => $dataProvider,
        'summaryText' => '',
        'htmlOptions' => ['class' => 'table-responsive'],
        'itemsCssClass' => 'table table-hover',
        'rowCssClassExpression' => '$data->actual ? "" : "not-actual"',
        'columns' => [
            [
                'name' => 'id',
                'type' => 'text',
                'header' => 'ID',
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'header' => 'Имя',
            ],
            [
                'name' => 'lastName',
                'type' => 'text',
                'header' => 'Фамилия',
            ],
            [
                'name' => 'phone',
                'type' => 'text',
                'header' => 'Телефон',
            ],
            [
                'name' => 'email',
                'type' => 'text',
                'header' => 'E-mail',
            ],
            [
                'name' => 'datetime',
                'type' => 'text',
                'header' => 'Желательная дата и время приёма',
            ],
            [
                'name' => 'actual',
                'type' => 'raw',
                'header' => 'Актуальность заявки',
                'value' => function ($data) {
                    if ($data['actual'] > 0) {
                        return 'Актуальна';
                    } else {
                        return 'Не актуальна';
                    }
                }
            ],
            [
                'class' => 'CButtonColumn',
                'buttons' => array(
                    'unactual' => array(
                        'label' => 'Пометить неактуальной',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/delete_icon.png',
                        'url' => 'Yii::app()->createUrl("admin/index", array("id" => $data["id"], "actual" => 0))',
                        'visible' => '$data["actual"] == "1"',
                        'options' => array(
                            'ajax' => array(
                                'type' => 'post', 'url' => 'js:$(this).attr("href")',
                                'success' => 'js:function(data) {
                                    $.fn.yiiGridView.update("Appointments");
                                }'
                            ),
                        ),
                    ),
                    'actual' => array(
                        'label' => 'Восстановить',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/restore_icon.png',
                        'url' => 'Yii::app()->createUrl("admin/index", array("id" => $data["id"], "actual" => 1))',
                        'visible' => '$data["actual"] == "0"',
                        'options' => array(
                            'ajax' => array(
                                'type' => 'post', 'url' => 'js:$(this).attr("href")',
                                'success' => 'js:function(data) {
                                    $.fn.yiiGridView.update("Appointments");
                                }'
                            ),
                        ),
                    )
                ),
                'template' => '{unactual} {actual}',
            ]
        ]
    ]
);
?>
