<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<div id="header">
				<h2>Mathematics Competition PARSIAL 2020</h2>
			</div>

			<div class="form-container">
				<form action="" autocomplete="on" id="form-regist" class="validate-form" method="post">
					<fieldset>
						<legend>Informasi Data Diri</legend>
						<div class="form-grup">
							<div class="label">
								<label>Nama Lengkap</label>
							</div>
							<div class="input">
								<input type="text" name="name" placeholder="Isikan nama lengkap Anda" maxlength="30" autofocus required>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Asal Sekolah</label>
							</div>
							<div class="input">
								<input type="text" name="school" placeholder="misal: SMAN 12 BEKASI" maxlength="30" autofocus required />
							</div>
						</div>
						<div class="form-grup birthday-form-grup">
							<div class="label">
								<label>Tempat, Tanggal Lahir</label>
							</div>
							<div class="input">
								<input type="text" name="birth_place" placeholder="misal: Bekasi" required>
								<input type="date" name="birth_date" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Alamat Lengkap</label>
							</div>
							<div class="input">
								<textarea name="address" cols="40" rows="3" placeholder="misal: Jalan Ir. Juanda No.45 Ciputat, Tangerang Selatan, Banten" required /></textarea>
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Email</label>
							</div>
							<div class="input">
								<input type="email" name="email" placeholder="misal: email_anda@gmail.com; email_anda@yahoo.com" required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label" id="only-number">
								<label>Nomor Telepon (WA)</label>
							</div>
							<div class="input">
								<input type="tel" name="phone" placeholder="misal: 085712345678" maxlength="13" autofocus required />
							</div>
						</div>
						<div class="form-grup">
							<div class="label">
								<label>Nama Pembimbing</label>
							</div>
							<div class="input">
								<input type="text" name="tutor_name" placeholder="Isikan nama pembimbing Anda" maxlength="30" autofocus>
							</div>
						</div>
						<div class="form-grup">
							<div class="label" id="only-number">
								<label>Nomor Telepon Pembimbing</label>
							</div>
							<div class="input">
								<input type="tel" name="tutor_phone" placeholder="misal: 085712345678" maxlength="15" autofocus>
							</div>
						</div>
					</fieldset>

					<div class="form-grup">
						<hr>
						<input type="checkbox" name="syarat_ketentuan" required />Saya sudah membaca dan menyetujui <a href="http://himatika.fst.uinjkt.ac.id/parsial2020/mathcomp/sk/" target="_blank">Syarat dan Ketentuan</a> 
					</div>

					<div class="form-grup">
						<button type="submit" name="submit">Submit</button>
					</div>
					
				</form>
			</div>