<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <?php echo $dashboard_alert_file_install; ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Licence</span>
                                    <span class="info-box-number">Free</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">AdminLTE version</span>
                                    <span class="info-box-number">2.3.1</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number"><?php echo $count_users; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Security groups</span>
                                    <span class="info-box-number"><?php echo $count_groups; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
<?php
/*
if ($url_exist) {
    echo 'OK';
} else {
    echo 'KO';
}
*/
?>
                        </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Timeline</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                        	<p class="text-center"><strong>MCC</strong></p>
											<table class="table table-striped table-hover">
												<tbody>
													<tr>
														<td colspan="3"><strong>Babak penyisihan (online)</strong></td>
													</tr>
													<tr>
														<td>Tanggal</td>
													<td>:</td>
														<td>1 – 29 Februari 2020</td>
													</tr>
													<tr>
														<td>Pukul</td>
														<td>:</td>
														<td>-</td>
													</tr>
													<tr>
														<td colspan="3"><strong>Babak final</strong></td>
													</tr>
													<tr>
														<td>Hari, Tanggal</td>
														<td>:</td>
														<td>Jumat, 27 Maret 2020</td>
													</tr>
													<tr>
														<td>Pukul</td>
														<td>:</td>
														<td>13.00 – 17.35 WIB</td>
													</tr>
												</tbody>
											</table>
                                        </div>
										<div class="col-md-4">
											<p class="text-center"><strong>Mathcomp</strong></p>
											<table class="table table-striped table-hover">
												<tbody>
													<tr>
														<td colspan="3"><strong>Babak penyisihan</strong></td>
													</tr>
													<tr>
														<td>Hari, Tanggal</td>
														<td>:</td>
														<td>Selasa, 10 Maret 2020</td>
													</tr>
													<tr>
														<td>Pukul</td>
														<td>:</td>
														<td>07.15 s/d selesai</td>
													</tr>
													<tr>
														<td colspan="3"><strong>Babak Semifinal</strong></td>
													</tr>
													<tr>
														<td>Hari, Tanggal</td>
														<td>:</td>
														<td>Rabu, 11 Maret 2020</td>
													</tr>
													<tr>
														<td>Pukul</td>
														<td>:</td>
														<td>07.15 s/d selesai</td>
													</tr>
													<tr>
														<td colspan="3"><strong>Babak final</strong></td>
													</tr>
													<tr>
														<td>Hari, Tanggal</td>
														<td>:</td>
														<td>Kamis, 12 Maret 2020</td>
													</tr>
													<tr>
														<td>Pukul</td>
														<td>:</td>
														<td>07.15 s/d selesai</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-4">
											<p class="text-center"><strong>Futsal</strong></p>
											<table class="table table-striped table-hover">
												<tbody>
													<tr>
														<td><strong>IKAHIMATIKA</strong></td>
														<td>21 - 22 Maret 2020</td>
													</tr>
													<tr>
														<td><strong>Mahasiswa Umum</strong></td>
														<td>16 - 19 Maret 2020</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
