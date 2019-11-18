<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<!-- header -->
			<header>
				<div class="container-fluid">
					<div class="header d-lg-flex justify-content-between align-items-center py-3 px-sm-3">
						<!-- logo -->
						<div id="logo">
							<h1><a href="index.html"><span class="fa fa-linode mr-2"></span>Parsial 2020</a></h1>
						</div>
						<!-- //logo -->
						<!-- nav -->
						<div class="nav_w3ls">
							<nav>
								<label for="drop" class="toggle">Menu</label>
								<input type="checkbox" id="drop" />
								<ul class="menu">
									<li><a href="<?php echo base_url();?>" class="<?php echo active_link_controller('home');?>">Home</a></li>

			                        <?php if($count_contents):?>
			                        <?php foreach ($menu_contents as $content):?>
		                            <li><a href="<?php echo site_url('/'.$content->slug);?>" title="<?php echo $content->title;?>"><?php echo $content->name;?></a></li>
			                        <?php endforeach;endif;?>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</nav>
						</div>
						<!-- //nav -->
						<div class="d-flex mt-lg-1 mt-sm-2 mt-3 justify-content-center">
							<!-- search -->
							<div class="search-w3layouts mr-3">
								<form action="#" method="post" class="search-bottom-wthree d-flex">
									<input class="search" type="search" placeholder="Search Here..." required="">
									<button class="form-control btn" type="submit"><span class="fa fa-search"></span></button>
								</form>
							</div>
							<!-- //search -->
						</div>
					</div>
				</div>
			</header>
			<!-- //header -->