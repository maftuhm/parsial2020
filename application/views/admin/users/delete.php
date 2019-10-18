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
                                    <h3 class="box-title">
                                        <?php 
                                            if($session_id == $id){
                                                $question = 'users_self_delete_question';
                                            }else{
                                                $question = 'users_delete_question';
                                            }
                                            echo sprintf(lang($question), '<span class="label label-primary">'.$firstname.$lastname).'</span>';
                                            echo lang('actions_delete').' '.$firstname.$lastname.'?';
                                        ?>
                                    </h3>
                                </div>
                                <div class="box-body">
                                    <?php echo form_open('admin/users/delete/'. $id, array('class' => 'form-horizontal', 'id' => 'form-status_user')); ?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <label class="radio-inline">
                                                    <input type="radio" name="confirm" id="confirm1" value="yes" checked="checked"> <?php echo strtoupper(lang('actions_yes', 'confirm')); ?>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="confirm" id="confirm0" value="no"> <?php echo strtoupper(lang('actions_no', 'confirm')); ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <?php echo form_hidden($csrf); ?>
                                                <?php echo form_hidden(array('id'=>$id)); ?>
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat btn-action', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo anchor('admin/users', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat btn-action')); ?>
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
