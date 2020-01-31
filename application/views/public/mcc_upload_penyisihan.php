<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

		<div id="header">
			<h3><?php echo $title;?></h3>
		</div>
		<div class="form-container upload-btn-wrapper">
			<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Isi semua data di bawah ini dengan lengkap!</legend>
					<div class="form-grup">
						<?php if($show_email_form): ?>
						<div class="label">
							<label>Nama Tim</label>
						</div>
						<div class="input">
							<input type="text" name="name_team" placeholder="Isi nama team Anda" maxlength="30" autofocus required />
						</div>
						<div class="label">
							<label>Email Ketua Tim</label>
						</div>
						<div class="input">
							<input type="email" name="email" placeholder="misal: emailketuatim@gmail.com" required />
						</div>
						<?php endif;?>

						<div class="label">
							<label>Upload Makalah</label>
						</div>
						<div class="input">
							<input type="file" class="form-upload" name="makalah" /required>
						</div>
						<div class="label">
							<label>Upload Poster</label>
						</div>
						<div class="input">
							<input type="file" class="form-upload" name="poster" /required>
						</div>
					</div>
						
				</fieldset>
				<div class="form-grup button-submit">
					<button type="submit" name="submit">Submit</button>
				</div>
			</form>
		</div>