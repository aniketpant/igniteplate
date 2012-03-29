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
                    <?php if(!$fb_data['me']): ?>
                    <a href="<?php echo $fb_data['loginUrl']; ?>"><i class="icon-facebook-sign" style="font-size: 3em;"></i></a>
                    <!-- Or you can use XFBML -->
                    <div class="fb-login-button" data-show-faces="false" data-width="100" data-max-rows="1" data-scope="email,user_birthday,publish_stream"></div>
                    <?php else: ?>
                    <img src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" alt="" class="pic" />
                    <p>Hi <?php echo $fb_data['me']['name']; ?>,<br />
                    <a href="<?php echo site_url('topsecret'); ?>">You can access the top secret page</a> or <a href="<?php echo $fb_data['logoutUrl']; ?>">logout</a> </p>
                    <?php endif; ?>

                </section>

<?php include 'inc/footer.php'; ?>