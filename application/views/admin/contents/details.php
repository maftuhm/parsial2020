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
                                                    echo $value;
                                                }
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
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
                                                    <img style="width: auto; max-width: 100%; max-height: 250px;" 
                                                    src="<?php echo base_url($upload_dir.$participant_payment['file_name']);?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><?php echo lang('contents_action'); ?></th>
                                                <td>
                                                    <?php //echo anchor('admin/contents/p/'.$content_slug.'/edit/'.$participant_id, '<i class="fa fa-edit"></i> '.lang('edit'), array('class' => 'btn btn-primary btn-action')); ?>
                                                    <!-- <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash-o"></i> <?php //echo lang('delete');?></button> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                <div class="box-body">
                                    <table id="dataTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
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
                                                        echo '<td>'.$i.'</td>';
                                                        foreach ($members_keys as $keys => $key)
                                                        {
                                                            echo '<td>'.$value[$key].'</td>';
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
                                                <th>No</th>
                                                <?php foreach ($all_keys as $key => $value):?>
                                                <th><?php echo lang('contents_'.$value);?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </section>
            </div>
