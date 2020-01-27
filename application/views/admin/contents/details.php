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
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tim Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            <?php
                                                foreach ($participant_data as $key => $value)
                                                {
                                                    echo '<tr>';
                                                    echo '<th>' . lang('contents_'.$key) . '</th>';
                                                    echo '<td>:</td>';
                                                    echo '<td>';
                                                    if ($key == 'created_on')
                                                    {
                                                        echo date('D, d M Y H:i', $value);
                                                    }
                                                    elseif (preg_match('/_date$/', $key))
                                                    {
                                                        echo date('l, d M Y', $value);
                                                    }
                                                    else
                                                    {
                                                        if ($key == 'name' OR $key == 'tim_name') {
                                                            $name = $value;
                                                        }
                                                        echo $value;
                                                    }
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            <tr>
                                                <th><?php echo lang('contents_action'); ?></th>
                                                <td>:</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php 
                                                            $site_url =  site_url(array('admin/contents/p', $content_slug , 'delete', $participant_id));
                                                            $attr_delete = 'title="'.lang('actions_delete').' '.$name.'" data-name="'.$name.'" data-url="'.$site_url.'"';
                                                        ?>
                                                        <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#modal-danger" <?php echo $attr_delete;?>><i class="fa fa-trash-o"></i> <?php echo lang('actions_delete');?></button>
                                                        <?php echo anchor(array('admin/contents/p', $content_slug, /*'edit', */'details', $participant_id), '<i class="fa fa-edit"></i> '.lang('actions_edit'), array('class' => 'btn btn-primary btn-action', 'title' => lang('actions_edit').' '.$name));
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Payment Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <?php 
                                                echo '<tr>';
                                                    echo '<th>'.lang('contents_payment').'</th>';
                                                    echo '<td>';
                                                    if ($paid){echo lang('contents_paid');}else{echo lang('contents_not_paid');}
                                                    echo '<td>';
                                                echo '</tr>';
                                                if ($paid){
                                                    foreach ($payment_keys as $keys => $key)
                                                    {
                                                        echo '<tr>';
                                                            echo '<th>'.lang('contents_'.$key).'</th>';
                                                            echo '<td>';
                                                            if($key == 'upload_time'){echo date('D, d M Y H:i', $participant_payment[$key]);}
                                                            else{echo $participant_payment[$key];}
                                                            echo '</td>';
                                                        echo '</tr>';

                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <th><?php echo lang('contents_proof_payment'); ?></th>
                                                    <td>
                                                        <?php 
                                                        	$image_name = $participant_payment['file_name'];
                                                        	$image_url = base_url($upload_dir.$image_name);
                                                            if($participant_payment['file_ext'] == '.pdf')
                                                            {
                                                                echo '<iframe src="'.$image_url.'" type="application/pdf" width="300" height="400" frameBorder="0">This browser does not support PDFs.</iframe><div>Download the PDF : <a href="'.$image_name.'">'.$image_name.'</a></div>';
                                                            }
                                                            else
                                                            {
                                                            	echo '<img style="max-width: 300px;max-height: 250px;" src="'.$image_url.'" title="'.$image_name.'" alt="'.$image_name.'">';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><?php echo lang('contents_action'); ?></th>
                                                    <td>
                                                        <?php 
                                                        // echo anchor('admin/contents/p/'.$content_slug.'/edit/'.$participant_id, '<i class="fa fa-edit"></i> '.lang('edit'), array('class' => 'btn btn-primary btn-action'));
                                                        // echo anchor('admin/contents/p/'.$content_slug.'/send_email/'.$participant_id, '<i class="fa fa-envelope"></i> '.lang('edit'), array('class' => 'btn btn-primary btn-action'));
                                                        ?>

                                                        <?php 
                                                            echo form_open('admin/mailbox/compose', array('method'=>'GET'));
                                                            if($content_team_group == TRUE){
                                                                if (!empty($members_data)) {
                                                                    $member_name = $members_data[0]['name'] ? $members_data[0]['name'] : $name;
                                                                }
                                                                else
                                                                {
                                                                    $member_name = $name;
                                                                }
                                                                echo form_hidden('name', $member_name);
                                                            }else{
                                                                echo form_hidden('name', $name);
                                                            }
                                                            echo form_hidden('email', $participant_data['email']);
                                                            echo form_hidden('content_slug', $content_slug);
                                                            $site_url =  site_url(array('admin/contents/p', $content_slug , 'delete', $participant_id, 'payment'));
                                                            $attr_delete = 'title="'.lang('actions_delete').' '.$name.' payment" data-name="'.$name.'\'s payment" data-url="'.$site_url.'"';
                                                        ?>
                                                        <div class="btn-group">
                                                            <button type="submit" class="btn btn-primary btn-action" title="Confirm payment"><i class="fa fa-envelope"></i> Confirm</button>
                                                            <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#modal-danger" <?php echo $attr_delete;?>><i class="fa fa-trash-o"></i> <?php echo lang('actions_delete');?></button>
                                                        </div>
                                                        <?php echo form_close();?>
                                                        <!-- <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash-o"></i> <?php //echo lang('delete');?></button> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($content_team_group == TRUE):?>
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Members Details</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body members-details">
                                    <?php echo form_open(site_url(array('admin/contents/p', $content_slug , 'delete', $participant_id, 'members')), array('id' => 'members-form', 'method' => 'GET'));?>
                                    <table class="dataTable table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><button style="width: 34px;" type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                                <th>No</th>
                                                <?php foreach ($all_keys as $key => $value):?>
                                                <th><?php echo lang('contents_'.$value);?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($members_data as $member => $value)
                                                {
                                                    echo '<tr>';
                                                    if ($inputed_members)
                                                    {
                                                        echo '<td class="checkbox-member"><input type="checkbox" name="members_id[]" value="'.$value['id'].'"></td>';
                                                        echo '<td>'.$i.'</td>';
                                                        foreach ($members_keys as $keys => $key)
                                                        {
                                                            echo '<td>';
                                                            if ($key == 'name')
                                                            {
                                                                echo '<a href="'.$value['id'].'">'.$value[$key].'</a>';
                                                            }
                                                            else
                                                            {
                                                                echo $value[$key];
                                                            }
                                                            echo '</td>';
                                                        }

                                                        if ($uploaded)
                                                        {
                                                            foreach ($media_keys as $keys => $key)
                                                            {
                                                                echo '<td><img class="image-pa" src="'.base_url($upload_data_dir.$value[$key]) .'"></td>';
                                                            }
                                                        }
                                                    }
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><button style="width: 34px;" type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                                <th>No</th>
                                                <?php foreach ($all_keys as $key => $value):?>
                                                <th><?php echo lang('contents_'.$value);?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#modal-delete-members"><i class="fa fa-trash-o"></i> <?php //echo lang('actions_delete');?></button> -->
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </section>
            </div>
            <div class="modal modal-danger fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?php echo lang('actions_delete') . ' participant?';?></h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <?php echo anchor('#', lang('actions_delete'), array('class' => 'btn btn-outline btn-delete')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal modal-danger fade" id="modal-delete-members">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?php //echo lang('actions_delete') . ' participant?';?></h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button id="delete" type="submit" class="btn btn-outline" data-dismiss="modal"><?php //echo lang('actions_delete')?></button>
                        </div>
                    </div>
                </div>
            </div> -->
