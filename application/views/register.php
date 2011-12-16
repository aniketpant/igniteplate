<?php include '/inc/header.php'; ?>

    <h1>
        Register
    </h1>

    <?php
        echo form_open('register');
        echo form_label('Email', 'email');
        $input_email = array(
            'name'  => 'email',
            'id'    => 'email',
            'value' => set_value('email')
        );
    ?>
    <div class="input">
    <?php
        echo form_input($input_email);
    ?>
        <span class="help-block">Enter your email</span>  
    </div>
    <?php
        $input_password = array(
            'name'  => 'password',
            'id'    => 'password',
            'value' => setvalue('password')
        );
    ?>
    <div class="input">
    <?php
        echo form_input($input_password);
    ?>
        <span class="help-block">Enter your password</span>
    </div>
    <?php
        echo form_close();
    ?>

<?php include 'inc/footer.php'; ?>