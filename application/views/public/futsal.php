<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
		<div id="header">
			<h2>Futsal Competition PARSIAL 2020</h2>
		</div>

		<div class="form-container">
			<form action="" method="post" autocomplete="on" id="form1">
				<fieldset>
					<legend>Informasi Umum Tim</legend>
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
							<label>Nama Pemain</label>
						</div>
						<div class="input">
							<input type="text" name="player_name" placeholder="Isi salah satu nama pemain" maxlength="30" autofocus required />
						</div>
					</div>
					<div class="form-grup">
						<div class="label">
							<label>Semester</label>
						</div>
						<div class="input">
							<input type="text" name="grade" placeholder="misal: 6" maxlength="1" autofocus required />
						</div>
					</div>
					<div class="form-grup">
						<div class="label">
							<label>Universitas</label>
						</div>
						<div class="input">
							<input type="text" name="university" placeholder="misal: UIN Syarif Hidayatullah Jakarta" maxlength="30" autofocus required />
						</div>
					</div>
					<div class="form-grup">
						<div class="label" id="only-number">
							<label>Nomor Telepon (WA)</label>
						</div>
						<div class="input">
							<input type="tel" name="phone" placeholder="misal: 08571234XXXX" maxlength="13" autofocus required />
						</div>
					</div>
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
							<label>Official</label>
						</div>
						<div class="input">
							<input type="text" name="official" placeholder="misal: Adisty Putr" maxlength="30" autofocus required />
						</div>
					</div>
					<div class="form-grup">
						<div class="label">
							<label>Pelatih</label>
						</div>
						<div class="input">
							<input type="text" name="coach" placeholder="misal: Adisty Putr" maxlength="30" autofocus required />
						</div>
					</div>
				</fieldset>

				<div class="form-grup">
					<hr>
					<input type="checkbox" name="syarat_ketentuan" required />Saya sudah membaca dan menyetujui <a href="http://himatika.fst.uinjkt.ac.id/parsial2020/futsal/sk/" target="_blank">Syarat dan Ketentuan</a> 
				</div>

				<div class="form-grup">
					<button type="submit" name="submit">Submit</button>
				</div>
			</form>
		</div>