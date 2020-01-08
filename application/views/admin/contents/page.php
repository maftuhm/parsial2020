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
                                    <h3 class="box-title"><?php #echo $content_name;?></h3>
                                </div>
                                <div class="box-body">
                                    <div class="box-body">
                                        <table id="dataTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <?php 
                                                    foreach ($content_keys as $key => $value): 
                                                        echo '<th>'.lang('contents_'.$value).'</th>'; 
                                                    endforeach;?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($content_data as $content):?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <?php foreach ($content_keys as $key => $value):?>
                                                    
                                                        <?php 
                                                            if ($value == 'created_on')
                                                            {
                                                                echo '<td>'.date('D, d M Y H:i', $content->$value).'</td>';
                                                            }
                                                            elseif($value == 'tim_name' OR $value == 'name')
                                                            {
                                                                $atts_profile   = array('class' => 'url_action', 'title' => lang('actions_see').' '.$content->$value);
                                                                $atts_edit      = array('class' => 'url_action', 'title' => lang('actions_edit').' '.$content->$value);
                                                                $atts_delete    = array('class' => 'url_action', 'title' => lang('actions_delete').' '.$content->$value);
                                                                $value_profile_btn  = '<span class="label label-primary"><i class="fa fa-user" aria-hidden="true"></i> <span>'.lang('actions_see').'</span>';
                                                                $value_edit_btn  = '<span class="label label-warning"><i class="fa fa-edit" aria-hidden="true"></i> <span>'.lang('actions_see').'</span>';
                                                                $value_delete_btn  = '<span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i> <span>'.lang('actions_delete').'</span>';

                                                                echo '<td class="name">';
                                                                echo anchor('admin/contents/p/'.$content_slug.'/details/'.$content->id, $content->$value, $atts_profile);
                                                                echo '<div class="actions show-actions">';
                                                                echo anchor('admin/contents/p/'.$content_slug.'/details/'.$content->id, $value_profile_btn, $atts_profile);
                                                                echo anchor('admin/contents/p/'.$content_slug.'/edit/'.$content->id, $value_edit_btn, $atts_edit);
                                                                echo anchor('admin/contents/p/'.$content_slug.'/delete/'.$content->id, $value_delete_btn, $atts_delete);
                                                                echo '</div>';
                                                                echo '</td>';
                                                            }
                                                            else
                                                            {
                                                                echo '<td>'.$content->$value.'</td>';
                                                            }
                                                        ?>
                                                    
                                                    <?php endforeach;?>
                                                </tr>
                                                <?php $i++; endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <?php foreach ($content_keys as $key => $value):?>
                                                    <th><?php echo lang('contents_'.$value);?></th>
                                                    <?php endforeach;?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
