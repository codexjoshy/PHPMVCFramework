<h1>Registration</h1>

<div class='row'>
 <div class='col-6'>
  <?php $form = \app\core\form\Form::begin('/register', 'post')   ?>
  <?php echo $form->field($model, 'name') ?>
  <?php echo $form->field($model, 'email', 'email') ?>
  <?php echo $form->field($model, 'phone', 'number') ?>
  <?php echo $form->field($model, 'password')->passwordField() ?>
  <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php \app\core\form\Form::end();  ?>



 </div>
</div>