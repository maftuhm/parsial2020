<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
				<div class="content-wrapper">
					<section class="content-header">
						<h1>Mailbox</h1>
						<ol class="breadcrumb">
							<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active">Mailbox</li>
						</ol>
					</section>

					<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-md-3">
								<a href="mailbox.html" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
								<div class="box box-solid">
									<div class="box-header with-border">
										<h3 class="box-title">Folders</h3>

										<div class="box-tools">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										</div>
									</div>
									<div class="box-body no-padding">
										<ul class="nav nav-pills nav-stacked">
											<li><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
											<li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
											<li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
											<li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
										</ul>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /. box -->
								<div class="box box-solid">
									<div class="box-header with-border">
										<h3 class="box-title">Labels</h3>

										<div class="box-tools">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										</div>
									</div>
									<!-- /.box-header -->
									<div class="box-body no-padding">
										<ul class="nav nav-pills nav-stacked">
											<li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
											<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
											<li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
										</ul>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /.box -->
							</div>
							<!-- /.col -->
							<div class="col-md-9">
								<div class="box box-primary">
                                    <?php echo form_open(current_url()); ?>

									<div class="box-header with-border">
										<h3 class="box-title">Compose New Message</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="To:" value="<?php echo $email_data['email'];?>">
										</div>
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="Subject:" value="<?php echo $email_data['subject'];?>">
										</div>
										<div id="editor" class="form-group">
											<textarea name="message" id="compose-textarea" class="form-control" style="height: 300px">
												<p><?php echo $email_data['message'];?></p>
											</textarea>
										</div>
										<div class="form-group mailbox-button">
											<div class="btn-group">
												<div class="btn btn-default btn-file">
													<i class="fa fa-paperclip"></i> Attachment
													<input type="file" name="attachment">
												</div>
												<span class="checkbox-mail">
													<input type="checkbox" name="add_table">
													<span> <i class="fa fa-table"></i> Add timeline table</span>
												</span>
												<select class="select-mail" name="content_slug">
													<?php foreach ($menu_contents as $content){
														echo '<option value="' . $content->slug . '">' . $content->title . '</option>';
													}
													?>
												</select>
											</div>
											<p class="help-block">Max. 32MB</p>
										</div>
									</div>
									<!-- /.box-body -->
									<div class="box-footer mailbox-button">
										<div class="pull-right">
											<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-preview-email" data-toggle="modal" data-name="<?php //echo $name?>" data-message=""><i class="fa fa-eye"></i> Preview</button> -->
											<button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
											<button type="submit" class="btn btn-default" onclick="javascript: form.action='<?php echo base_url('/admin/mailbox/preview_email');?>'; form.target='_blank';"><i class="fa fa-eye"></i> Preview</button>
											<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
											<button type="submit" class="btn btn-primary" onclick="javascript: form.action='<?php echo current_url();?>'; form.target='';"><i class="fa fa-envelope-o"></i> Send</button>
										</div>
									</div>
									<?php echo form_close();?>
								</div>
							</div>
						</div>
					</section>
				</div>
	            <!-- <div class="modal fade" id="modal-preview-email">
	                <div class="modal-dialog modal-email">
	                    <div class="modal-content">
	                    	<div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title">Preview Email</h4>
	                        </div>
	                        <div class="modal-body">
	                        	<iframe src="<?php //echo base_url('/admin/mailbox/preview_email');?>" width="100%" height="auto" style="border: none;">
	                        	</iframe>
	                            <?php
							   //      if (empty($data)) {
										// $data = array(
										// 	'name'          => 'Maftuh',
										// 	'title'         => 'Pendaftaran Berhasil!',
										// 	'infoblock'     => 'Pendaftaran berhasil! Terimakasih atas partisipasi anda.',
										// 	'message'       => 'Terimakasih atas partisipasi anda pada kegiatan ',
										// 	'button'        => '',
										// 	'link'          => '',
										// 	'table'			=> ''
										// );
							   //      }
							        //echo $this->load->view('email/index', $data, TRUE);
	                            ?>
	                        </div>
	                    </div>
	                </div>
	            </div> -->