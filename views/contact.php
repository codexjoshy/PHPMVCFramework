<?php
$this->title = "Contact";
/**
 * @var app\models\forms\ContactForm $model
 */
?>
<h1>Contact</h1>

<div class='row'>
 <div class='col-6'>
  <?php $form = \app\core\form\Form::begin('', 'post')   ?>
  <?php echo $form->field($model, 'email', 'email') ?>
  <?php echo $form->field($model, 'subject') ?>
  <?php echo $form->field($model, 'body')->textAreaField() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php \app\core\form\Form::end();  ?>
 </div>
</div>