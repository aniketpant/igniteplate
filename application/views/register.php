<?php include '/inc/header.php'; ?>

    <h1>
        Register
    </h1>
    <?php    
        echo form_open('main/register');
        echo form_label('Email', 'email');
        $arr_email = array(
            'name' => 'email',
            'id' => 'email',
            'value' => set_value('email')
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_email);
    ?>
    </div>
    <br/>
    <?php
        echo form_label('Password', 'password');
        $arr_password = array(
            'name' => 'password',
            'id' => 'password',
            'value' => set_value('password')
        );
    ?>
    <div class="input">
    <?php        
        echo form_password($arr_password);
    ?>
    </div>
    <br/>
    <?php
        echo form_label('Confirm Password', 'passconf');
        $arr_passconf = array(
            'name' => 'passconf',
            'id' => 'passconf',
            'value' => set_value('passconf')
        );
    ?>
    <div class="input">
    <?php        
        echo form_password($arr_passconf);
    ?>
    </div>
    <br/>
    <?php
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Register Me!',
            'class' => 'btn primary large'
        );
    ?>
    <div class="input">
    <?php
        echo form_submit($arr_button);
    ?>
    </div>
    <br/>
    <?php
        echo form_close();
        if ( $error != NULL )
            echo '<div class="alert-message error">'. $error.' </div>';
        echo validation_errors();
    ?>

<?php include 'inc/footer.php'; ?>