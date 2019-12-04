<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<div id="header">
				<h3>Form Upload Berkas MCC 2020</h3>
			</div>

			<div class="form-container upload-btn-wrapper">
				<?php echo $content_id.$id.'<br>'; echo $message.$error;#print_r($data_content);?>
				<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Upload Scan KTM</legend>
						<?php if($show_email_form):?>
						<div class="form-group">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="leader_email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
						<?php endif;?>
						<div class="form-group">
							<div class="label">
								<label>Scan KTM Ketua Tim</label>
							</div>
							<div class="input">
								<input type="file" class="form-control" name="ktm[]" /required>
							</div>
						</div>
						<div class="form-group">
							<div class="label">
								<label>Scan KTM Anggota</label>
						</div>
							<div class="input">
								<input type="file" class="form-control" name="ktm[]" /required>
							</div>
						</div>

					</fieldset>

					<div class="form-group">
						<button type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>
