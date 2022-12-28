<?php

use codexjoshy\sleekmvc\form\TextAreaField;

/**
 * @var app\models\forms\ContactForm $model
 */

$this->title = "Contact";
?>
<h1>Contact</h1>

<div class='row'>
 <div class='col-6'>
  <?php $form = \codexjoshy\sleekmvc\form\Form::begin('', 'post')   ?>
  <?php echo $form->field($model, 'email', 'email') ?>
  <?php echo $form->field($model, 'subject') ?>
  <?php echo new TextAreaField($model, 'body') ?>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php \codexjoshy\sleekmvc\form\Form::end();  ?>
 </div>
</div>