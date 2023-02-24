<?php
use common\models\User;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap4\ActiveForm */

?>
<?php $form = ActiveForm::begin() ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <?php echo $form->field($model, 'username')->textInput(['options' => ['placeholder' => 'Enter UserName']]) ?>
                <?php echo $form->field($model, 'email')->textInput(['options' => ['placeholder' => 'Enter Email']]) ?>
                <?php echo $form->field($model, 'password')->passwordInput(['options' => ['placeholder' => 'Enter Password']]) ?>
                <?php echo $form->field($model, 'repeat_password')->passwordInput(['options' => ['placeholder' => 'Enter Same Password']]) ?>
                <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton('Save', ['id' => 'save', 'class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?php ActiveForm::end() ?>
