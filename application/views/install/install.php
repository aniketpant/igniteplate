<?php echo form_open('install/index'); ?>
<ul class="form-fields">
  <li>
    <?php
    echo form_label('Database Host', 'db_host');
    echo form_input(
      array(
        'name' => 'db_host',
        'value' => set_value('db_host'),
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Database Username', 'db_user');
    echo form_input(
      array(
        'name' => 'db_user',
        'value' => set_value('db_user'),
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Database Password', 'db_pass');
    echo form_password(
      array(
        'name' => 'db_pass',
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_label('Database Name', 'db_name');
    echo form_input(
      array(
        'name' => 'db_name',
        'value' => set_value('db_name'),
        'class' => 'text-input'
        ));
    ?>
  </li>
  <li>
    <?php
    echo form_submit(array(
      'name' => 'submit',
      'value' => 'Install',
      'class' => 'btn btn--small'
      ));
    ?>
  </li>
</ul>
<?php echo form_close(); ?>

<div class="islet">
  <?php echo validation_errors(); ?>
</div>