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
                                    <h3 class="box-title"><?php echo lang('contents_create'); ?></h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;#var_dump($questions[0]);?>
                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_questions')); ?>
                                        <?php for ($i=0; $i < $num_of_quest; $i++):?>

                                        <div class="form-group question">
                                            <div class="col-sm-4">
                                                <?php echo form_input($questions[$i][0]);?>
                                            </div>
                                            <div class="col-sm-2">
                                                <?php echo form_dropdown($questions[$i][1]);?>
                                            </div>
                                            <div class="col-sm-2">
                                                <?php echo form_input($questions[$i][2]);?>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>
                                                <?php echo form_checkbox($questions[$i][3]);?> Tes
                                                </label>
                                            </div>
                                        </div>
                                        <?php endfor;?>
                                        <div class="form-group">
                                            <div class="col-sm-12">
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
