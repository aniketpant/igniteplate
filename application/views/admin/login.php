<?php include 'application/views/inc/header.php'; ?>

                <section>

                    <div class="page-header"><h1><i class="icon-signin"></i>&nbsp;Administrator Login</h1></div>

                    <?php
                        echo form_open('admin/login', array('class' => 'form-horizontal'));
                    ?>
                    <div class="control-group">
                        <?php
                            //echo form_label('user_name  ', 'user_name', array('class' => 'control-label'));
                            $arr_user_name = array(
                                'name'          => 'user_name',
                                'id'            => 'user_name',
                                'class'         => 'span2',
                                'placeholder'   => 'Your username here',
                                'value'         => set_value('user_name')
                            );
                        ?>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-user icon-large"></i></span>
                            <?php
                                echo form_input($arr_user_name);
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
                                <span class="add-on"><i class="icon-key icon-large"></i></span>
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

                </section>

<?php include 'application/views/inc/footer.php'; ?>