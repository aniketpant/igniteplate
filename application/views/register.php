<?php include 'inc/header.php'; ?>

                <section>

                    <h1>Register</h1>
                    <?php    
                        echo form_open('main/register', array('class' => 'form-horizontal'));
                    ?>
                    <div class="control-group">
                        <?php
                            //echo form_label('Email', 'email', array('class' => 'control-label'));
                            $arr_email = array(
                                'name'          => 'email',
                                'id'            => 'email',
                                'class'         => 'span2',
                                'placeholder'   => 'Email address',
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
                            //echo form_label('Password', 'password', array('class' => 'control-label'));
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
                            //echo form_label('Confirm Password', 'passconf', array('class' => 'control-label'));
                            $arr_passconf = array(
                                'name'          => 'passconf',
                                'id'            => 'passconf',
                                'class'         => 'span2',
                                'placeholder'   => 'Confirm Password',
                                'value'         => set_value('passconf')
                            );
                        ?>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-key"></i></span>
                            <?php        
                                echo form_password($arr_passconf);
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                            $arr_button = array(
                                'name'  => 'submit',
                                'value' => 'Register',
                                'class' => 'btn btn-primary'
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