<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;margin:0;">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="x-apple-disable-message-reformatting">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="telephone=no" name="format-detection">
	<title><?php echo $title; ?></title>
	<!--[if (mso 16)]>
	<style type="text/css">
	a {text-decoration: none;}
	</style>
	<![endif]-->
	<!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
	<!--[if !mso]><!-- -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i" rel="stylesheet">
	<!--<![endif]-->
	<style type="text/css">
		@media only screen and (max-width:600px) {
			p,
			ul li,
			ol li,
			a {
				font-size: 14px!important;
				line-height: 150%!important
			}
			h1 {
				font-size: 25px!important;
				text-align: center;
				line-height: 120%!important
			}
			h2 {
				font-size: 26px!important;
				text-align: center;
				line-height: 120%!important
			}
			h3 {
				font-size: 20px!important;
				text-align: center;
				line-height: 120%!important
			}
			h1 a {
				font-size: 30px!important
			}
			h2 a {
				font-size: 26px!important
			}
			h3 a {
				font-size: 20px!important
			}
			.es-menu td a {
				font-size: 16px!important
			}
			.es-header-body p,
			.es-header-body ul li,
			.es-header-body ol li,
			.es-header-body a {
				font-size: 16px!important
			}
			.es-footer-body p,
			.es-footer-body ul li,
			.es-footer-body ol li,
			.es-footer-body a {
				font-size: 12px!important
			}
			.es-infoblock p,
			.es-infoblock ul li,
			.es-infoblock ol li,
			.es-infoblock a {
				font-size: 12px!important
			}
			*[class="gmail-fix"] {
				display: none!important
			}
			.es-m-txt-c,
			.es-m-txt-c h1,
			.es-m-txt-c h2,
			.es-m-txt-c h3 {
				text-align: center!important
			}
			.es-m-txt-r,
			.es-m-txt-r h1,
			.es-m-txt-r h2,
			.es-m-txt-r h3 {
				text-align: right!important
			}
			.es-m-txt-l,
			.es-m-txt-l h1,
			.es-m-txt-l h2,
			.es-m-txt-l h3 {
				text-align: left!important
			}
			.es-m-txt-r img,
			.es-m-txt-c img,
			.es-m-txt-l img {
				display: inline!important
			}
			.es-button-border {
				display: block!important
			}
			a.es-button {
				font-size: 20px!important;
				display: block!important;
				border-width: 10px 0px 10px 0px!important
			}
			.es-btn-fw {
				border-width: 10px 0px!important;
				text-align: center!important
			}
			.es-adaptive table,
			.es-btn-fw,
			.es-btn-fw-brdr,
			.es-left,
			.es-right {
				width: 100%!important
			}
			.es-content table,
			.es-header table,
			.es-footer table,
			.es-content,
			.es-footer,
			.es-header {
				width: 100%!important;
				max-width: 600px!important
			}
			.es-adapt-td {
				display: block!important;
				width: 100%!important
			}
			.adapt-img {
				width: 100%!important;
				height: auto!important
			}
			.es-m-p0 {
				padding: 0px!important
			}
			.es-m-p0r {
				padding-right: 0px!important
			}
			.es-m-p0l {
				padding-left: 0px!important
			}
			.es-m-p0t {
				padding-top: 0px!important
			}
			.es-m-p0b {
				padding-bottom: 0!important
			}
			.es-m-p20b {
				padding-bottom: 20px!important
			}
			.es-mobile-hidden,
			.es-hidden {
				display: none!important
			}
			.es-desk-hidden {
				display: table-row!important;
				width: auto!important;
				overflow: visible!important;
				float: none!important;
				max-height: inherit!important;
				line-height: inherit!important
			}
			.es-desk-menu-hidden {
				display: table-cell!important
			}
			table.es-table-not-adapt,
			.esd-block-html table {
				width: auto!important
			}
			table.es-social {
				display: inline-block!important
			}
			table.es-social td {
				display: inline-block!important
			}
			.table-striped>tbody>tr>td{
			    font-size: 12px !important;
			}
		}
		
		#outlook a {
			padding: 0;
		}
		
		.ExternalClass {
			width: 100%;
		}
		
		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,
		.ExternalClass td,
		.ExternalClass div {
			line-height: 100%;
		}
		
		.es-button {
			mso-style-priority: 100!important;
			text-decoration: none!important;
		}
		
		a[x-apple-data-detectors] {
			color: inherit!important;
			text-decoration: none!important;
			font-size: inherit!important;
			font-family: inherit!important;
			font-weight: inherit!important;
			line-height: inherit!important;
		}
		
		.es-desk-hidden {
			display: none;
			float: left;
			overflow: hidden;
			width: 0;
			max-height: 0;
			line-height: 0;
			mso-hide: all;
		}
		.table-striped>tbody>tr {
		    background-color: #f9f9f9;
		}
		.table-striped>tbody>tr:nth-of-type(odd) {
		    background-color: #ededed;
		}
		.table-striped>tbody>tr>td{
			padding: 8px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border: 1px solid #000;
		    font-size: 14px;
		}
		.table-striped {
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
			border-collapse:collapse;
			border-spacing:0px;
			width:80%;
		}
	</style>
</head>

<body style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;margin:0;">
	<div class="es-wrapper-color" style="background-color:#E4E5E7;">
		<!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#e4e5e7"></v:fill>
			</v:background>
		<![endif]-->
		<table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
			<tr style="border-collapse:collapse;">
				<td valign="top" style="padding:0;margin:0;">
					<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
						<tr style="border-collapse:collapse;">
							<td class="es-adaptive" align="center" style="padding:0;margin:0;">
								<table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:10px;margin:0;">
											<table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="580" align="left" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td class="es-infoblock" align="left" style="padding:0;margin:0;line-height:14px;font-size:12px;color:#999999;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#999999;"><?php echo $infoblock; ?></p>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
						<tr style="border-collapse:collapse;">
							<td align="center" style="padding:0;margin:0;">
								<table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#34265F;">
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:0;margin:0;padding-left:20px;padding-right:20px;">
											<!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="178" valign="top"><![endif]-->
											<table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;">
												<tr style="border-collapse:collapse;">
													<td class="es-m-p0r es-m-p20b" width="178" valign="top" align="center" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-c" align="left" style="padding:0;margin:0;padding-left:10px;padding-right:10px;padding-top:20px;position:relative;">
																	<a href="https://www.parsialhimatika.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#FFFFFF;"><img src="https://www.parsialhimatika.com/assets/templates/startup_corporate/images/logoparsial202050px.png" alt="PARSIAL 2020 | Travel Across The Universe" title="PARSIAL 2020 | Travel Across The Universe" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;width:137px;height:50px;" height="50"></a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!--[if mso]></td></tr></table><![endif]-->
										</td>
									</tr>
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:0;margin:0;">
											<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="600" valign="top" align="center" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;"><img class="adapt-img" src="https://www.parsialhimatika.com/media/email/47051523540803179.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="600"></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
						<tr style="border-collapse:collapse;">
							<td align="center" style="padding:0;margin:0;">
								<table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EDEDED;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ededed" align="center">
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:0;margin:0;">
											<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="600" valign="top" align="center" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;padding-top:20px;padding-left:40px;padding-right:40px;">
																	<h1 style="margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:tahoma, verdana, segoe, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#333333;">Pendaftaran Berhasil!</h1></td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;"><img class="adapt-img" src="https://www.parsialhimatika.com/media/email/92931515066045884.jpg" alt width="600" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;padding-bottom:5px;padding-left:40px;padding-right:40px;">
																	<h3 style="margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:tahoma, verdana, segoe, sans-serif;font-size:20px;font-style:normal;font-weight:600;color:#333333;">Dear <?php echo $name;?>,</h3></td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;padding-bottom:10px;padding-left:40px;padding-right:40px;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#333333;"><?php echo $message; ?>
																	</p>
																</td>
															</tr>
															<?php if(!empty($button)): ?>
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-c" align="center" style="margin:0;padding-top:5px;padding-left:15px;padding-right:15px;padding-bottom:20px;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"><a target="_blank" href="<?php echo $link; ?>" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><?php echo $link; ?></a></p>
																</td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:15px;"><span class="es-button-border" style="border-style:solid;border-color:transparent;background:#34265F none repeat scroll 0% 0%;border-width:0px;display:inline-block;border-radius:5px;width:auto;"><a href="<?php echo $button['url']; ?>" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#34265F;border-width:10px 20px 10px 20px;display:inline-block;background:#34265F none repeat scroll 0% 0%;border-radius:5px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;"><?php echo $button['value']; ?></a></span></td>
															</tr>
															<?php else:?>
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-l" align="center" style="margin:0;padding-top:5px;padding-left:15px;padding-right:15px;padding-bottom:20px;">
																	<?php echo $table; ?>
																</td>
															</tr>
															<?php endif;?>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
						<tr style="border-collapse:collapse;">
							<td align="center" style="padding:0;margin:0;">
								<table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#EDEDED;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ededed" align="center">
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:0;margin:0;">
											<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="600" valign="top" align="center" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:0;margin:0;"><img class="adapt-img" src="https://www.parsialhimatika.com/media/email/94931515066951223.png" alt width="600" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="border-collapse:collapse;">
										<td style="margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#34265F;" bgcolor="#34265f" align="left">
											<table cellspacing="0" cellpadding="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="560" align="left" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td align="left" style="padding:0;margin:0;padding-top:5px;">
																	<h3 style="margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:'source sans pro', 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#FFFFFF;">Follow us</h3></td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-c" align="left" style="padding:0;margin:0;padding-top:15px;">
																	<table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
																		<tr style="border-collapse:collapse;">
																			<td valign="top" align="center" style="padding:0;margin:0;padding-right:5px;">
																				<a target="_blank" href="https://web.facebook.com/parsial.himatika.3" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><img title="Facebook" src="https://www.parsialhimatika.com/media/email/facebook-rounded-white.png" alt="Fb" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a>
																			</td>
																			<td valign="top" align="center" style="padding:0;margin:0;padding-right:5px;">
																				<a target="_blank" href="https://www.instagram.com/parsialhimatika.uinjkt" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><img title="Instagram" src="https://www.parsialhimatika.com/media/email/instagram-rounded-white.png" alt="Ig" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a>
																			</td>
																			<td valign="top" align="center" style="padding:0;margin:0;padding-right:5px;">
																				<a target="_blank" href="https://www.youtube.com/channel/UCLb7GCLgwPB4egtOzw3dDDA" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><img title="Youtube" src="https://www.parsialhimatika.com/media/email/youtube-rounded-white.png" alt="Yt" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a>
																			</td>
																			<td valign="top" align="center" style="padding:0;margin:0;padding-right:5px;">
																				<a target="_blank" href="tel:081211383113" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><img title="Whatsapp" src="https://www.parsialhimatika.com/media/email/whatsapp-rounded-white.png" alt="Whatsapp" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a>
																			</td>
																			<td valign="top" align="center" style="padding:0;margin:0;">
																				<a target="_blank" href="mailto:parsialhimatika.uinjkt@gmail.com" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#34265F;"><img title="Email" src="https://www.parsialhimatika.com/media/email/mail-rounded-white.png" alt="Email" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
						<tr style="border-collapse:collapse;">
							<td align="center" style="padding:0;margin:0;">
								<table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;">
									<tr style="border-collapse:collapse;">
										<td align="left" style="margin:0;padding-top:5px;padding-bottom:5px;padding-right:20px;padding-left:40px;">
											<!--[if mso]><table width="540" cellpadding="0" cellspacing="0"><tr><td width="62" valign="top"><![endif]-->
											<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;">
												<tr style="border-collapse:collapse;">
													<td width="42" class="es-m-p0r es-m-p0b" align="center" style="padding:0;margin:0;">
														<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-c" align="left" style="padding:0;margin:0;padding-right:10px;padding-top:5px;">
																	<a target="_blank" href="http://himatika.fst.uinjkt.ac.id" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:none;color:#34265F;"><img src="https://www.parsialhimatika.com/assets/templates/startup_corporate/images/logohimatika100px.png" alt="HIMATIKA FST UIN Syarif Hidayatullah Jakarta" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="42" title="HIMATIKA FST UIN Syarif Hidayatullah Jakarta"></a>
																</td>
																<td class="es-m-txt-c" align="left" style="padding:0;margin:0;padding-top:5px;">
																	<a target="_blank" href="https://www.parsialhimatika.com" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:none;color:#34265F;"><img src="https://www.parsialhimatika.com/assets/templates/startup_corporate/images/logoparsial100px.png" alt="PARSIAL 2020 | Travel Across The Universe" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="50" title="PARSIAL 2020 | Travel Across The Universe"></a>
																</td>
															</tr>
														</table>
													</td>
													<td class="es-hidden" width="20" style="padding:0;margin:0;"></td>
												</tr>
											</table>

											<!--[if mso]></td><td width="20"></td><td width="168" valign="top"><![endif]-->
											<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;">
												<tr style="border-collapse:collapse;">
													<td width="168" align="center" style="padding:0;margin:0;">
														<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td class="es-m-txt-c" align="center" style="padding:0;margin:0;padding-top:10px;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#333333;">Ayu Amalia (081211383113)</p>
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#333333;"><a target="_blank" href="mailto:parsialhimatika.uinjkt@gmail.com" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:none;color:#34265F;">parsialhimatika.uinjkt@gmail.com</a></p>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!--[if mso]></td></tr></table><![endif]-->
										</td>
									</tr>
									<tr style="border-collapse:collapse;">
										<td align="left" style="padding:0;margin:0;padding-top:0;padding-left:20px;padding-right:20px;">
											<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
												<tr style="border-collapse:collapse;">
													<td width="560" valign="top" align="center" style="padding:0;margin:0;">
														<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:10px;margin:0;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;">You are receiving this email because you have registered on our site.</p>
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;"><a class="unsubscribe" href="https://#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:none;color:#34265F;">Unsubscribe</a> | <a style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:none;color:#34265F;" href="https://#">Update Preferences</a></p>
																</td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;">
																	<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
																		<tr style="border-collapse:collapse;">
																			<td style="padding:0;margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;"></td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr style="border-collapse:collapse;">
																<td align="center" style="padding:10px;margin:0;">
																	<p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:18px;color:#999999;">Jalan Ir. Juanda Nomor 95, Ciputat, Tangerang Selatan, Banten, 15412</p>
																	<a href="#" style="display: none;"><?php echo $link; ?></a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>