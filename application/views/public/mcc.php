<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<div id="header">
				<h2>Mathematic Computation Competition PARSIAL 2020</h2>
			</div>

			<div class="form-container">
				<?php echo $message;?>
				<form action="<?php echo current_url();?>" method="post" autocomplete="on" id="form1">
					<fieldset>
						<legend>Informasi umum</legend>
						<div class="form-grup">
							<div class="label">
								<label>Nama Tim</label>
							</div>
							<div class="input">
								<input type="text" name="tim_name" placeholder="misal: Integral UIN Jakarta" maxlength="30" autofocus required>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Nama Universitas</label>
							</div>
							<div class="input">
								<input type="text" name="university" placeholder="misal: UIN Syarif Hidayatullah Jakarta" maxlength="30" autofocus required />
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>Informasi Data Diri Ketua Tim</legend>
						<div class="form-grup">
							<div class="label">
								<label>Nama Lengkap</label>
							</div>
							<div class="input">
								<input type="text" name="leader_name" placeholder="Nama lengkap ketua tim" maxlength="30" autofocus required>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Jurusan</label>
							</div>
							<div class="input">
								<input type="text" name="leader_major" placeholder="misal: Matematika" maxlength="30" autofocus required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label" id="only-number">
								<label>Nomor Telepon (WA)</label>
							</div>
							<div class="input">
								<input type="tel" name="leader_phone" placeholder="misal: 08571234XXXX" maxlength="13" autofocus required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="leader_email" placeholder="misal: email_anda@gmail.com" required />
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>Informasi Data Diri Anggota Tim</legend>
						<div class="form-grup">
							<div class="label">
								<label>Nama Lengkap</label>
							</div>
							<div class="input">
								<input type="text" name="member_name" placeholder="nama Lengkap" maxlength="30" autofocus required>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Jurusan</label>
							</div>
							<div class="input">
								<input type="text" name="member_major" placeholder="misal: UIN Syarif Hidayatullah Jakarta" maxlength="30" autofocus required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label" id="only-number">
								<label>Nomor Telepon (WA)</label>
							</div>
							<div class="input">
								<input type="tel" name="member_phone" placeholder="misal: 08571234XXXX" maxlength="13" autofocus required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="member_email" placeholder="misal: email@gmail.com" required />
							</div>
						</div>
					</fieldset>

					<div class="form-grup">
						<hr>
						<input type="checkbox" name="syarat_ketentuan" required />Saya sudah membaca dan menyetujui <a href="http://himatika.fst.uinjkt.ac.id/parsial2019/mathematic-competition/sk/" target="_blank">Syarat dan Ketentuan</a> 
					</div>

					<div class="form-grup button-submit">
						<button type="submit" name="submit">Submit</button>
					</div>
					
				</form>
			</div>