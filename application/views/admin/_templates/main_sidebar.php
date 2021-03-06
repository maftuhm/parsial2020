<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?=active_link_controller('mailbox')?>">
                            <a href="#">
	                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
	                            <!-- <span class="pull-right-container">
	                            <small class="label pull-right bg-yellow">12</small>
	                            <small class="label pull-right bg-green">16</small>
	                            <small class="label pull-right bg-red">5</small>
	                            </span> -->
	                            <span class="pull-right-container">
	                            <i class="fa fa-angle-left pull-right"></i>
	                            </span>
                            </a>
                            <ul class="treeview-menu">
	                            <!-- <li class="">
		                            <a href="#">Inbox
		                            <span class="pull-right-container">
		                            	<span class="label label-primary pull-right">13</span>
		                            </span>
	                            </a>
	                            </li> -->
	                            <li class="<?=active_link_function('compose')?>">
	                            	<a href="<?php echo site_url('admin/mailbox/compose'); ?>">Compose</a>
	                            </li>
	                            <!-- <li class="">
	                            	<a href="#">Read</a>
	                            </li> -->
                            </ul>
                        </li>
                        <?php if ($admin_prefs['contents_menu'] == TRUE): if($count_contents):?>
                        <li class="header text-uppercase"><?php echo lang('menu_contents'); ?></li>
                        <?php foreach ($menu_contents as $content):?>
                            <li class="<?=active_link_function_paramater($content->slug)?>">
                                <a href="<?php echo site_url('admin/contents/p/'.$content->slug); ?>">
                                    <i class="fa fa-book"></i> <span><?php echo $content->title; ?></span>
                                </a>
                            </li>
                        <?php 
                            endforeach;endif;endif;
                            if ($is_admin):
                        ?>
                        <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>
                        <li class="<?=active_link_controller('contents')?>">
                            <a href="<?php echo site_url('admin/contents'); ?>">
                                <i class="fa fa-book"></i> <span><?php echo lang('menu_contents'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo lang('menu_security_groups'); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('menu_preferences'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/prefs/interfaces/admin'); ?>"><?php echo lang('menu_interfaces'); ?></a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span><?php echo lang('menu_files'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('database')?>">
                            <a href="<?php echo site_url('admin/database'); ?>">
                                <i class="fa fa-database"></i> <span><?php echo lang('menu_database_utility'); ?></span>
                            </a>
                        </li>
                    <?php endif;?>

                        <li class="header text-uppercase"><?php echo $title; ?></li>
                        <li class="<?=active_link_controller('license')?>">
                            <a href="<?php echo site_url('admin/license'); ?>">
                                <i class="fa fa-legal"></i> <span><?php echo lang('menu_license'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('resources')?>">
                            <a href="<?php echo site_url('admin/resources'); ?>">
                                <i class="fa fa-cubes"></i> <span><?php echo lang('menu_resources'); ?></span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
