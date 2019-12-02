<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<div id="header">
				<h2>Mathematic Computation Competition PARSIAL 2020</h2>
			</div>

			<div class="form-container">
				<form action="<?php echo current_url();?>" enctype="multipart/form-data" method="post" autocomplete="on" id="form1">
					<fieldset>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Pemilik rekening</label>
							</div>
							<div class="input">
								<input type="text" name="pemilik_rekening" placeholder="misal: Nama Anda" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Bukti Pembayaran</label>
							</div>
							<div class="input">
								<input type="file" name="bukti_pembayaran" required />
							</div>
						</div>
					</fieldset>

					<div class="form-grup">
						<hr>
						<input type="checkbox" name="syarat_ketentuan" required />Saya sudah membaca dan menyetujui <a href="http://himatika.fst.uinjkt.ac.id/parsial2020/mathematics-computation-competition/sk/" target="_blank">Syarat dan Ketentuan</a> 
					</div>

					<div class="form-grup">
						<button type="submit" name="submit">Submit</button>
					</div>
					
				</form>
			</div>