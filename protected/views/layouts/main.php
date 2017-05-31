<?php
/**
 * @var $this GoController
 */

$app = Yii::app();
$app->clientScript->registerCoreScript('jquery');
$app->clientScript->registerScriptFile(
    $app->request->baseUrl . '/js/datetimepicker.js', CClientScript::POS_END
);
$app->clientScript->registerScriptFile(
    $app->request->baseUrl . '/js/scripts.js', CClientScript::POS_END
);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= $app->request->baseUrl; ?>/css/styles.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $app->request->baseUrl; ?>/css/bootstrap.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div id="navbar">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?= $app->createUrl('site/index'); ?>">Подать заявку</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <?php if (!$app->user->isGuest) { ?>
                        <a href="<?= $app->createUrl('admin/logout'); ?>">
                            <?= 'Выход (' . $app->user->name . ')'; ?></a>
                    <?php } else { ?>
                        <a href="<?= $app->createUrl('admin/login'); ?>">Вход</a>
                    <?php }?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container content-container" id="page">
        <?php echo $content; ?>

        <div class="clear"></div>
    </div><!-- page -->
</body>
</html>
