<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


			<div id="header">
				<h3><?php echo $page_title;// print_r($tes);?></h3>
			</div>

			<div class="form-container upload-btn-wrapper">
				<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Upload Bukti Pembayaran</legend>
						<?php if($show_email_form): ?>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
						<?php endif;?>
						<div class="form-grup">
							<div class="label">
								<label>Nama Bank</label>
							</div>
							<div class="input">
								<input type="text" name="bank_name" placeholder="misal: Mandiri, BRI" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Pemilik Rekening</label>
							</div>
							<div class="input">
								<input type="text" name="account_owner" placeholder="misal: Nama Pemilik Rekening" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Nomor Rekening</label>
							</div>
							<div class="input">
								<input type="text" name="account_number" placeholder="misal: 123456789" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Bukti Pembayaran</label>
							</div>
							<div class="input">
								<input type="file" class="form-upload" name="userfile" /required>
							</div>
						</div>
					</fieldset>

					<div class="form-grup button-submit">
						<button type="submit" name="submit">Submit</button>
					</div>
				</form>
			</div>

