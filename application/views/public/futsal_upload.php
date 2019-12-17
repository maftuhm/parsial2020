<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


			<div id="header">
				<h3>Form Upload Berkas Futsal Competition PARSIAL 2020</h3>
			</div>

			<div class="form-container">
				<?php /*print_r($player_data); */print_r($id_file);?>
				<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">
					<?php if($show_email_form): ?>
					<fieldset>
						<legend>Email</legend>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
					</fieldset>
					<?php endif;?>
					<?php for ($i=1; $i <=10 ; $i++):?>
					<fieldset>
						<legend>Pemain <?php echo $i;?></legend>
						<div class="form-grup">
							<div class="label">
								<label>Nama Pemain</label>
							</div>
							<div class="input">
								<input type="text" name="player_name[]" placeholder="misal: Fathur" />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Foto pemain</label>
							</div>
							<div class="input">
								<input type="file" class="form-upload" name="photo[]" />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>KTM Pemain</label>
						</div>
							<div class="input">
								<input type="file" class="form-upload" name="ktm[]" />
							</div>
						</div>
					</fieldset>
				<?php endfor;?>
					<div class="form-grup button-submit">
						<button type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>

