<?php echo form_open('user/register'); ?>
<ul class="form-fields">
  <li>
    <?php
    echo form_label('Username', 'user_name');
    echo form_input(
      array(
        'name' => 'user_name',
        'value' => set_value('user_name'),
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Email', 'user_email');
    echo form_input(
      array(
        'name' => 'user_email',
        'type' => 'email',
        'value' => set_value('user_email'),
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Password', 'user_pass');
    echo form_password(
      array(
        'name' => 'user_pass',
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Confirm Password', 'pass_conf');
    echo form_password(
      array(
        'name' => 'pass_conf',
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_submit(array(
      'name' => 'submit',
      'value' => 'Login',
      'class' => 'btn btn--small'
      ));
    ?>
  </li>
</ul>
<?php echo form_close(); ?>

<div class="islet">
  <?php echo validation_errors(); ?>
</div>