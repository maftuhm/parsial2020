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
                                    <h3 class="box-title"></h3>
                                    <pre><?php print_r($content_data);?></pre>
                                </div>
                                <div class="box-body">
                                    <div class="box-body">
                                        <table class="dataTable table table-striped table-hover">
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
                                                            echo '<td><div class="nowrap">';
                                                            if ($value == 'created_on')
                                                            {
                                                                echo date('D, d M Y H:i', $content->$value);
                                                                if ($content->payment != NULL)
                                                                {
                                                                    $image = $content->payment->file_name;
                                                                    $url_image = site_url(array('media', $content_slug, $image));
                                                                    $label = 'label-success';
                                                                    $payment = lang('contents_paid');
                                                                    $attr_modal = array(
                                                                        'href' => '#',
                                                                        'data-toggle' => 'modal',
                                                                        'data-target' => '#modal-image-payment',
                                                                        'data-upload_time' => date('D, d M Y H:i', $content->payment->time),
                                                                        'data-bank_name' => $content->payment->bank_name,
                                                                        'data-account_owner' => $content->payment->account_owner,
                                                                        'data-account_number' => $content->payment->account_number,
                                                                        'data-file_name' => $image,
                                                                        'data-url' => $url_image,
                                                                        'data-alt' => $image
                                                                    );
                                                                    $attr_modal = attributes_to_string_($attr_modal, array('=', ' '));
                                                                }
                                                                else
                                                                {
                                                                    $label = 'label-default';
                                                                    $payment = lang('contents_not_paid');
                                                                    $attr_modal = '';
                                                                }
                                                                echo '<div><a type="button" '.$attr_modal.'><span class="label-payment label '.$label.'">'.$payment.'</span></a></div>';
                                                            }
                                                            elseif(preg_match('/_date$/', $value))
                                                            {
                                                                echo date('d F Y', $content->$value);
                                                            }
                                                            elseif($value == 'tim_name' OR $value == 'name')
                                                            {
                                                                $atts_profile   = array('class' => 'url_action', 'title' => lang('actions_see').' '.$content->$value);
                                                                $atts_edit      = array('class' => 'url_action', 'title' => lang('actions_edit').' '.$content->$value);
                                                                $atts_delete    = array(
                                                                    'type' => 'button',
                                                                    'class' => 'url_action',
                                                                    'title' => lang('actions_delete').' '.$content->$value,
                                                                    'data-toggle' => 'modal', 
                                                                    'data-target'=> '#modal-danger', 
                                                                    'data-value' => $content->id
                                                                );

                                                                $value_profile_btn  = '<span class="label label-primary"><i class="fa fa-user" aria-hidden="true"></i> '.lang('actions_see').'</span>';
                                                                $value_edit_btn  = '<span class="label label-warning"><i class="fa fa-edit" aria-hidden="true"></i> '.lang('actions_edit').'</span>';
                                                                $value_delete_btn  = '<span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i> '.lang('actions_delete').'</span>';

                                                                echo anchor(array('admin/contents/p', $content_slug, 'details', $content->id), $content->$value, $atts_profile);
                                                                echo '<div class="actions show-actions">';
                                                                echo anchor(array('admin/contents/p', $content_slug, 'details', $content->id), $value_profile_btn, $atts_profile);
                                                                echo anchor(array('admin/contents/p', $content_slug, 'edit', $content->id), $value_edit_btn, $atts_edit);
                                                                $site_url =  site_url(array('admin/contents/p', $content_slug, 'delete', $content->id));
                                                                echo '<a href="#" type="button" data-toggle="modal" data-target="#modal-danger" data-name="'.$content->$value.'" data-url="'.$site_url.'">' . $value_delete_btn . '</a>';
                                                                echo '</div>';
                                                            }
                                                            else
                                                            {
                                                                echo $content->$value;
                                                            }
                                                            echo '</div></td>';
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
            <div class="modal fade" id="modal-image-payment">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?php echo lang('contents_payment') . ' participant';?></h4>
                        </div>
                        <div class="modal-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<tr>
										<td rowspan="4" class="payment-proof"></td>
										<th><?php echo lang('contents_upload_time')?></th>
										<td class="upload_time">1</td>
									</tr>
									<tr>
										<th><?php echo lang('contents_bank_name')?></th>
										<td class="bank_name">2</td>
									</tr>
									<tr>
										<th><?php echo lang('contents_account_owner')?></th>
										<td class="account_owner">3</td>
									</tr>
									<tr>
										<th><?php echo lang('contents_account_number')?></th>
										<td class="account_number">4</td>
									</tr>
								</table>
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn pull-right btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>