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
						<?php foreach ($user_info as $user): $full_name = ucfirst($user->first_name) . ' ' . ucfirst($user->last_name);?>
						<div class="col-md-4">
							<div class="box box-primary">
								<div class="box-body box-profile">
									<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" alt="<?php echo $full_name;?> picture">
									<h3 class="profile-username text-center"><?php echo $full_name;?></h3>
									<p class="text-muted text-center"><a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a></p>
																		<table class="table table-hover">
										<tbody>
											<?php if($is_admin):?>
											<tr>
												<th><?php echo lang('users_ip_address'); ?></th>
												<td><?php echo $user->ip_address; ?></td>
											</tr>
											<?php endif;?>
											<tr>
												<th><?php echo lang('users_username'); ?></th>
												<td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
											</tr>
											<tr>
												<th><?php echo lang('users_email'); ?></th>
												<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
											</tr>
											<tr>
												<th><?php echo lang('users_created_on'); ?></th>
												<td><?php echo date('d-m-Y', $user->created_on); ?></td>
											</tr>
											<?php if($is_admin):?>
											<tr>
												<th><?php echo lang('users_last_login'); ?></th>
												<td><?php echo ( ! empty($user->last_login)) ? date('d-m-Y', $user->last_login) : NULL; ?></td>
											</tr>
											<?php endif;?>
											<tr>
												<th><?php echo lang('users_status'); ?></th>
												<td><?php echo ($user->active) ? '<span class="label label-success">'.lang('users_active').'</span>' : '<span class="label label-default">'.lang('users_inactive').'</span>'; ?></td>
											</tr>
											<tr>
												<th><?php echo lang('users_company'); ?></th>
												<td><?php echo htmlspecialchars($user->company, ENT_QUOTES, 'UTF-8'); ?></td>
											</tr>
											<tr>
												<th><?php echo lang('users_phone'); ?></th>
												<td><?php echo $user->phone; ?></td>
											</tr>
											<tr>
												<th><?php echo lang('users_groups'); ?></th>
												<td>
												<?php foreach ($user->groups as $group):?>
													<?php echo '<span class="label" style="background:'.$group->bgcolor.'">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'; ?>
												<?php endforeach?>
												</td>
											</tr>
										</tbody>
									</table>
									<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
									<li><a href="#timeline" data-toggle="tab">Timeline</a></li>
									<li><a href="#settings" data-toggle="tab">Settings</a></li>
								</ul>
								<div class="tab-content">
									<div class="active tab-pane" id="activity">
										<!-- Post -->
										<div class="post">
											<div class="user-block">
												<img class="img-circle img-bordered-sm" src="<?php echo base_url($avatar_dir . '/m_002.png'); ?>" alt="user image">
												<span class="username">
													<a href="#">Jonathan Burke Jr.</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
												<span class="description">Shared publicly - 7:30 PM today</span>
											</div>
											<!-- /.user-block -->
											<p>
												Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
											</p>
											<ul class="list-inline">
												<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
												<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
												<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments(5)</a></li>
											</ul>

											<input class="form-control input-sm" type="text" placeholder="Type a comment">
										</div>
										<!-- /.post -->

										<!-- Post -->
										<div class="post clearfix">
											<div class="user-block">
												<img class="img-circle img-bordered-sm" src="<?php echo base_url($avatar_dir . '/m_003.png'); ?>" alt="User Image">
												<span class="username">
													<a href="#">Sarah Ross</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
												<span class="description">Sent you a message - 3 days ago</span>
											</div>
											<!-- /.user-block -->
											<p>
												Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
											</p>

											<form class="form-horizontal">
												<div class="form-group margin-bottom-none">
													<div class="col-sm-9">
														<input class="form-control input-sm" placeholder="Response">
													</div>
													<div class="col-sm-3">
														<button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
													</div>
												</div>
											</form>
										</div>
										<!-- /.post -->

										<!-- Post -->
										<div class="post">
											<div class="user-block">
												<img class="img-circle img-bordered-sm" src="<?php echo base_url($avatar_dir . '/m_004.png'); ?>" alt="User Image">
												<span class="username">
													<a href="#">Adam Jones</a>
													<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
												</span>
												<span class="description">Posted 5 photos - 5 days ago</span>
											</div>
											<!-- /.user-block -->
											<div class="row margin-bottom">
												<div class="col-sm-6">
													<img class="img-responsive" src="http://placehold.it/360x240" alt="Photo">
												</div>
												<!-- /.col -->
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-6">
															<img class="img-responsive" src="http://placehold.it/150x100" alt="Photo">
															<br>
															<img class="img-responsive" src="http://placehold.it/150x100" alt="Photo">
														</div>
														<!-- /.col -->
														<div class="col-sm-6">
															<img class="img-responsive" src="http://placehold.it/150x100" alt="Photo">
															<br>
															<img class="img-responsive" src="http://placehold.it/150x100" alt="Photo">
														</div>
														<!-- /.col -->
													</div>
													<!-- /.row -->
												</div>
												<!-- /.col -->
											</div>
											<!-- /.row -->

											<ul class="list-inline">
												<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
												<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
												<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
											</ul>
											<input class="form-control input-sm" type="text" placeholder="Type a comment">
										</div>
										<!-- /.post -->
									</div>
									<!-- /.tab-pane -->
									<div class="tab-pane" id="timeline">
										<!-- The timeline -->
										<ul class="timeline timeline-inverse">
											<!-- timeline time label -->
											<li class="time-label">
												<span class="bg-red">
												10 Feb. 2014
												</span>
											</li>
											<!-- /.timeline-label -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-envelope bg-blue"></i>

												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

													<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

													<div class="timeline-body">
														Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...
													</div>
													<div class="timeline-footer">
														<a class="btn btn-primary btn-xs">Read more</a>
														<a class="btn btn-danger btn-xs">Delete</a>
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-user bg-aqua"></i>

												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

													<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
															</h3>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-comments bg-yellow"></i>

												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

													<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

													<div class="timeline-body">
														Take me to your leader! Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood!
													</div>
													<div class="timeline-footer">
														<a class="btn btn-warning btn-flat btn-xs">View comment</a>
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<!-- timeline time label -->
											<li class="time-label">
												<span class="bg-green">
												3 Jan. 2014
												</span>
											</li>
											<!-- /.timeline-label -->
											<!-- timeline item -->
											<li>
												<i class="fa fa-camera bg-purple"></i>

												<div class="timeline-item">
													<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

													<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

													<div class="timeline-body">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
														<img src="http://placehold.it/150x100" alt="..." class="margin">
													</div>
												</div>
											</li>
											<!-- END timeline item -->
											<li>
												<i class="fa fa-clock-o bg-gray"></i>
											</li>
										</ul>
									</div>
									<!-- /.tab-pane -->

									<div class="tab-pane" id="settings">
										<?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_user')); ?>
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
											<div class="form-group validate-input">
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
													<div class="progress" style="margin:0">
	                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('password');?></span></div>
														<div class="pwstrength_viewport_progress"></div>
													</div>
												</div>
											</div>
											<div class="form-group validate-input">
												<?php echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
												<div class="col-sm-10">
													<?php echo form_input($password_confirm);?>
	                                                <div class="help-block"><i class="fa fa-times-circle-o"></i> <span class="message"><?php echo form_error('password_confirm');?></span></div>
											</div>
											</div>

											<?php if ($is_admin): ?>
											<div class="form-group validate-input">
												<label class="col-sm-2 control-label"><?php echo lang('users_member_of_groups');?></label>
												<div class="col-sm-10">
												<?php foreach ($groups as $group):?>
												<?php
													$gID     = $group['id'];
													$checked = NULL;
													$item    = NULL;

													foreach($currentGroups as $grp) {
														if ($gID == $grp->id) {
															$checked = ' checked="checked"';
															break;
														}
													}
												?>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked; ?>>
															<?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
														</label>
													</div>
												<?php endforeach?>
												</div>
											</div>
											<?php endif ?>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
													<?php echo form_hidden('id', $user->id);?>
													<?php echo form_hidden($csrf); ?>
													<?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
												</div>
											</div>
										<?php echo form_close();?>
									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div>
							<!-- /.nav-tabs-custom -->
						</div>
						<?php endforeach;?>
					</div>
				</section>
			</div>
