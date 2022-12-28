<?php

/**
 * @var app\models\forms\Login $model
 */


?>
<h1>Login</h1>

<div class='row'>
 <div class='col-6'>
  <?php $form = \codexjoshy\sleekmvc\form\Form::begin('', 'post')   ?>
  <?php echo $form->field($model, 'email', 'email') ?>
  <?php echo $form->field($model, 'password')->passwordField() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php \codexjoshy\sleekmvc\form\Form::end();  ?>



 </div>
</div>