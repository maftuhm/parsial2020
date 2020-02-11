<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo lang('users_create_user'); ?></h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal validate-form', 'id' => 'form-create_user')); ?>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_username', 'username', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($username);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('username');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_email', 'email', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($email);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('email');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_firstname', 'first_name', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($first_name);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('first_name');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_lastname', 'last_name', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($last_name);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('last_name');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('users_company', 'company', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($company);?>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_phone', 'phone', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($phone);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('phone');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_password', 'password', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password);?>
                                                <div class="help-block" style="position: absolute;"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('password');?></span></div>
                                                <div class="progress" style="margin:0">
                                                    <div class="pwstrength_viewport_progress"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group validate-input">
                                            <?php echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password_confirm);?>
                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('password');?></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/users', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
