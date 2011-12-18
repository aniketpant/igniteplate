<?php include '/inc/header.php'; ?>

    <h1>
        Login
    </h1>

    <?php
        echo form_open('main/login');
        echo form_label('Email  ', 'email');
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
        echo form_label('Password  ', 'password');
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
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Login',
            'class' => 'btn primary large'
        );
    ?>
    <div class="input">
    <?php
        echo form_submit($arr_button);
    ?>
    </div><br/>
    <div class="input">
    <?php
        echo anchor('/main/forgot-password', 'Forgot Password', array('title' => 'Forgot Passoword', 'class' => 'btn'));
    ?>
    </div><br/>
    <?php
        echo form_close();
        
        if ($error != "") {
    ?>
    <div class="alert-message error">
            <a class="close" href="#">×</a>
            <p><?php echo $error; ?></p>
    </div>
    <?php
        }
        echo validation_errors();
    ?>
    
    <!-- Uncomment the following part and change it accordingly for a faccebook login button -->
    
    <!--
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : 'YOUR_APP_ID',
            status     : true, 
            cookie     : true,
            xfbml      : true,
            oauth      : true
          });
        };
    (function(d){
       var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
       js = d.createElement('script'); js.id = id; js.async = true;
       js.src = "//connect.facebook.net/en_US/all.js";
       d.getElementsByTagName('head')[0].appendChild(js);
     }(document));
    </script>
    <div class="fb-login-button" data-perms="email,user_checkins">
        Login with Facebook
    </div>
    -->
    
    <script>
        $(".alert-message").alert()
    </script>

<?php include 'inc/footer.php'; ?>