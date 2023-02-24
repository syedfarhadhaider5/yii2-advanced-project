<?php
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */

?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl('user/index'); ?>">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Create User</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="mt-3">
    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>