<?php include 'application/views/inc/header.php'; ?>

                <section>
                    
                    <div class="page-header"><h1><i class="icon-cogs"></i>&nbsp;Admin Settings <small>Change features here</small></h1></div>
                    
                    <div class="well well-large">
                        <h2>Site Details</h2>
                        <?php
                            echo form_open('admin/settings', array('class' => 'form-horizontal'));
                        ?>
                        <div class="control-group">
                            <?php
                                echo form_label('Site Name', 'site_name', array('class' => 'control-label'));
                            ?>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-pencil icon-large"></i></span>
                                <?php
                                    $arr_user_name = array(
                                        'name'          => 'site_name',
                                        'id'            => 'site_name',
                                        'class'         => 'span3',
                                        'placeholder'   => 'Site Name',
                                        'value'         => set_value('site_name', $site_name)
                                    );
                                    echo form_input($arr_user_name);
                                ?>
                                </div>
                                <span class="help-block"><em>Enter the site name. The same name will be reflected all over the website.</em></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <?php
                                $arr_button = array(
                                    'name'  => 'submit',
                                    'value' => 'Update',
                                    'class' => 'btn btn-info'
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
                    <div class="well well-large">
                        <?php echo anchor('admin/resetdb', '<i class="icon-trash"></i>&nbsp;Reset Database', array('class' => 'btn btn-danger')) ?>
                        <span class="help-inline"><span class="label label-warning">Warning</span> Clicking this button to wipe out all records.</span>
                    </div>
                    
                </section>

<?php include 'application/views/inc/footer.php'; ?>