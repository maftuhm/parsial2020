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
                                    <h3 class="box-title"><?php echo anchor('admin/contents/create', '<i class="fa fa-plus"></i> '. lang('contents_create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div>
                                <div class="box-body">
                                    <table id="dataTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('contents_created_on');?></th>
                                                <th><?php echo lang('contents_name');?></th>
                                                <th><?php echo lang('contents_title');?></th>
                                                <th><?php echo lang('contents_description');?></th>
                                                <th><?php echo lang('contents_slug');?></th>
                                                <th><?php echo lang('contents_action');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($contents as $content):?>
                                            <tr>
                                                <td><?php echo date('D, d M Y H:i', $content->created_on);?></td>
                                                <td><?php echo htmlspecialchars($content->name, ENT_QUOTES, 'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($content->title, ENT_QUOTES, 'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($content->description, ENT_QUOTES, 'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($content->slug, ENT_QUOTES, 'UTF-8');?></td>
                                                <td>
                                                    <?php echo anchor('admin/contents/profile/'.$content->id, '<span class="label label-primary">'.lang('actions_see').'</span> ');?>
                                                    <?php echo anchor('admin/contents/edit/'.$content->id, '<span class="label label-warning">'.lang('actions_edit').'</span> ');?>
                                                    <?php echo anchor('admin/contents/delete/'.$content->id, '<span class="label label-danger">'.lang('actions_delete').'</span>');?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
