<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
		<div class="main-top" id="home">
			<nav class="navbar navbar-expand-sm fixed-top">
				<div class="container">
					<a class="navbar-brand" href="<?php echo base_url('/'); ?>">
						<img src="<?php echo base_url($templates_dir . '/images/logoparsial50px.png'); ?>" alt="Logo PARSIAL 2020" title="Travel Across The Universe" class="img-logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="nav navbar-nav d-flex justify-content-end">
							<li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
							<li class="nav-item"><a class="nav-link" href="#mcc">MCC</a></li>
							<li class="nav-item"><a class="nav-link" href="#mathcomp">Mathcomp</a></li>
							<li class="nav-item"><a class="nav-link" href="#futsal">Futsal</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url('/coming-soon'); ?>" title="Seminar" title="Seminar">Seminar</a></li>
							<li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</nav>