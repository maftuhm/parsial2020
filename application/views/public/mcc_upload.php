<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


			<div id="header">
				<h3>Form Upload Berkas MCC 2020</h3>
			</div>

			<div class="form-container upload-btn-wrapper">
				<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<?php if($show_email_form): ?>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="leader_email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
						<?php endif;?>
						<legend>Upload Scan KTM</legend>
						<div class="form-grup">
							<div class="label">
								<label>Scan KTM Ketua Tim</label>
							</div>
							<div class="input">
								<input type="file" class="form-upload" name="ktm[]" /required>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Scan KTM Anggota</label>
						</div>
							<div class="input">
								<input type="file" class="form-upload" name="ktm[]" /required>
							</div>
						</div>

					</fieldset>

					<div class="form-grup button-submit">
						<button type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>

