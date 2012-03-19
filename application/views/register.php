<?php include 'inc/header.php'; ?>

                <section>

                    <h1>Register</h1>
                    <?php    
                        echo form_open('main/register', array('class' => 'form-horizontal'));
                    ?>
                    <div class="control-group">
                        <?php
                            echo form_label('Email', 'email', array('class' => 'control-label'));
                            $arr_email = array(
                                'name' => 'email',
                                'id' => 'email',
                                'value' => set_value('email')
                            );
                        ?>
                        <div class="controls">
                        <?php
                            echo form_input($arr_email);
                        ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            echo form_label('Password', 'password', array('class' => 'control-label'));
                            $arr_password = array(
                                'name' => 'password',
                                'id' => 'password',
                                'value' => set_value('password')
                            );
                        ?>
                        <div class="controls">
                        <?php        
                            echo form_password($arr_password);
                        ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            echo form_label('Confirm Password', 'passconf', array('class' => 'control-label'));
                            $arr_passconf = array(
                                'name' => 'passconf',
                                'id' => 'passconf',
                                'value' => set_value('passconf')
                            );
                        ?>
                        <div class="controls">
                        <?php        
                            echo form_password($arr_passconf);
                        ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            $arr_button = array(
                                'name'  => 'submit',
                                'value' => 'Register',
                                'class' => 'btn btn-primary btn-large'
                            );
                        ?>
                        <div class="controls">
                        <?php
                            echo form_submit($arr_button);
                        ?>
                        </div>
                    </div>
                    <?php
                        echo form_close();
                        if ( $error != NULL )
                            echo '<div class="alert alert-error">'. $error.' </div>';
                        echo validation_errors();
                    ?>
                </section>

<?php include 'inc/footer.php'; ?>