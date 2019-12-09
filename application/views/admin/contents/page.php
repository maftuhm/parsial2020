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
                                    <h3 class="box-title">Content Name <?php //print_r($contents);print_r($contents_keys);?></h3>
                                </div>
                                <div class="box-body">
                                    <div class="box-body">
                                        <table id="dataTable" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <?php 
                                                    foreach ($contents_keys as $key => $value): 
                                                        echo '<th style="min-width:'.(strlen(lang('contents_'.$value))*14).'px;">'.lang('contents_'.$value).'</th>'; 
                                                    endforeach;?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($contents as $content):?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <?php foreach ($contents_keys as $key => $value):?>
                                                    
                                                        <?php 
                                                            if ($value == 'created_on')
                                                            {
                                                                echo '<td>'.date('d-m-Y', $content->$value).'</td>';
                                                            }
                                                            elseif($value == 'tim_name')
                                                            {
                                                                echo '<td class="name">';
                                                                $atts = array('class' => 'url_action','title' => lang('see').' '.$content->$value);
                                                                echo anchor('admin/contents/p/'.$content_name.'/profile/'.$content->id, $content->$value, $atts);
                                                                // echo '<div class="actions show-actions">';
                                                                // echo anchor('admin/contents/p/'.$content_name.'/profile/'.$content->id, '<i class="fa fa-user" aria-hidden="true"></i> <span>'.lang('see').'</span>', $atts);
                                                                // echo anchor('admin/contents/p/'.$content_name.'/delete/'.$content->id, '<i class="fa fa-trash" aria-hidden="true"></i> <span>'.lang('delete').'</span>', 'class="url_action"');
                                                                // echo '</div>';
                                                                echo '</td>';
                                                            }
                                                            else
                                                            {
                                                                echo '<td style="min-width:'.(strlen($content->$value)*14).'px;">'.$content->$value.'</td>';
                                                            }
                                                        ?>
                                                    
                                                    <?php endforeach;?>
                                                </tr>
                                                <?php $i++; endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <?php foreach ($contents_keys as $key => $value):?>
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
