<?php include 'application/views/inc/header.php'; ?>

                <section>
                    
                    <div class="page-header"><h1><i class="icon-fire"></i>&nbsp;Administrator Controls</h1></div>
                    
                    <div class="well">
                        
                        <?php echo form_open('admin/make_admin', array('class' => 'form-horizontal')); ?>
                        <div class="control-group">
                            <?php echo form_label('User Name', 'user_name', array('class' => 'control-label')); ?>
                            <div class="controls">
                                <div class="input">
                                <?php
                                    $arr_user_name = array(
                                        'name'          => 'user_name',
                                        'id'            => 'user_name',
                                        'class'         => 'span2',
                                        'placeholder'   => 'Your username here',
                                        'value'         => set_value('user_name')
                                    );
                                    echo form_input($arr_user_name);
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <?php
                                $arr_button = array(
                                    'name'  => 'submit',
                                    'value' => 'Make Admin',
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
                        </div>
                    
                </section>

<?php include 'application/views/inc/footer.php'; ?>