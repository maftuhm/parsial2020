<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
			<div id="header">
				<h2>Mathematic Computation Competition PARSIAL 2020</h2>
			</div>

			<div class="form-container">
				<p><?php /*print_r($id_file);echo $id_team;*/ ?></p>
				<form action="<?php echo current_url();?>" enctype="multipart/form-data" method="post" autocomplete="on" id="form1">
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
						<div class="form-grup inputfile-box">
							<div class="label">
								<label>KTM</label>
							</div>
							<input type="file" id="file1" name="ktm[]" class="inputfile" onchange='uploadFile1(this)'>
							<label for="file1">
								<span id="file-name1" class="file-box"></span>
								<span class="file-button">
									<i class="fa fa-upload" aria-hidden="true"></i>
									Select File
								</span>
							</label>
							<script type="text/javascript">function uploadFile1(target){document.getElementById("file-name1").innerHTML = target.files[0].name;}</script>
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
						<div class="form-grup inputfile-box">
							<div class="label">
								<label>KTM</label>
							</div>
							<input type="file" name="ktm[]" id="file2" class="inputfile" onchange='uploadFile2(this)'>
							<label for="file2">
								<span id="file-name2" class="file-box"></span>
								<span class="file-button">
									<i class="fa fa-upload" aria-hidden="true"></i>
									Select File
								</span>
							</label>
							<script type="text/javascript">function uploadFile2(target){document.getElementById("file-name2").innerHTML = target.files[0].name;}</script>
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