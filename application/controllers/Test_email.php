<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_email extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function index(){
		$data = array(
			'title' 		=> 'Pendaftaran Berhasil!',
			'infoblock' 	=> 'Pendaftaran berhasil! Silahkan lanjutkan ke tahap berikutnya',
			'message'		=> 'Pendaftaran berhasil! Terimakasih telah malakukan pendaftaran Mathematics Computation Competition. Silahkan lanjutkan ke tahap berikutnya dengan klik tombol dibawah atau melalui url berikut',
			'link'			=> array(
								'url'	=> 'https://www.parsialhimatika.com/mcc',
								'value'	=> 'www.parsialhimatika.com/mcc',
								),
			'button'		=> array(
								'url'	=> 'https://www.parsialhimatika.com/payment/mcc',
								'value'	=> 'Pembayaran',
								),
		);
		$message = $this->load->view('email/index', $data/*, TRUE*/);
		// $this->email->send_email($message);
	}
}
