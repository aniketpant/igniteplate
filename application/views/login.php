<?php include 'inc/header.php'; ?>

                <section>

                    <h1>Login</h1>

                    <?php
                        echo form_open('main/login', array('class' => 'form-horizontal'));
                    ?>
                    <div class="control-group">
                        <?php
                            //echo form_label('Email  ', 'email', array('class' => 'control-label'));
                            $arr_email = array(
                                'name'          => 'email',
                                'id'            => 'email',
                                'class'         => 'span2',
                                'placeholder'    => 'Email address',
                                'value'         => set_value('email')
                            );
                        ?>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                            <?php
                                echo form_input($arr_email);
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            //echo form_label('Password  ', 'password', array('class' => 'control-label'));
                            $arr_password = array(
                                'name'          => 'password',
                                'id'            => 'password',
                                'class'         => 'span2',
                                'placeholder'   => 'Password',
                                'value'         => set_value('password')
                            );
                        ?>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-key"></i></span>
                            <?php
                                echo form_password($arr_password);
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            $arr_button = array(
                                'name'  => 'submit',
                                'value' => 'Login',
                                'class' => 'btn btn-primary'
                            );
                        ?>
                        <div class="controls">
                        <?php
                            echo form_submit($arr_button);
                        ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <?php
                                echo anchor('/main/forgot-password', 'Forgot Password', array('title' => 'Forgot Passoword', 'class' => 'btn'));
                            ?>
                        </div>
                    </div>
                    <?php
                        echo form_close();

                        if ($error != "") {
                    ?>
                    <div class="alert alert-error">
                            <p><?php echo $error; ?></p>
                    </div>
                    <?php
                        }
                        echo validation_errors();
                    ?>

                    <!-- Uncomment the following part and change it accordingly for a facebook login button -->
                    <!--
                    <div id="fb-root"></div>
                    <script>
                    window.fbAsyncInit = function() {
                      FB.init({
                        appId      : 'YOUR_APP_ID',
                        status     : true, 
                        cookie     : true,
                        xfbml      : true,
                        oauth      : true,
                      });
                    };
                    (function(d){
                       var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                       js = d.createElement('script'); js.id = id; js.async = true;
                       js.src = "//connect.facebook.net/en_US/all.js";
                       d.getElementsByTagName('head')[0].appendChild(js);
                     }(document));
                    </script>
                    <div class="fb-login-button" data-scope="email">Login with Facebook</div>
                    -->

                </section>

<?php include 'inc/footer.php'; ?>