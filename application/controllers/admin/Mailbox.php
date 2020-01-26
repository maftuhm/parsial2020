<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['alert_modal'] = '';

    }

	public function compose()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
			$this->form_validation->set_rules('email', 'lang:email', 'required');
			$this->form_validation->set_rules('subject', 'lang:subject', 'required');
			if ($this->form_validation->run() == TRUE)
			{
				$data = $this->email_data();
				$message = $this->load->view('email/email_admin', $data, TRUE);
				if($this->email->send_email($data['title'], $message, $data['email']))
				{
					$message = '<p>Email berhasil dikirim</p>';
					$this->data['alert_modal'] = alert_admin('success', 'Email Sent', $message);
				}
				else
				{
					$message = '<p>Terjadi kesalahan. Email gagal dikirim.</p>';
					$this->data['alert_modal'] = alert_admin('danger', 'Send Email Failed', $message);
				}
			}
            $this->data['email_data'] = $this->email_data();
            /* Load Template */
            $this->template->admin_render('admin/mailbox/compose', $this->data);
        }
	}

    public function preview_email()
    {
    	$data = $this->email_data();
		$this->load->view('email/email_admin', $data);
    }
    function email_data()
    {
		$data = array(
			'title'         => 'Pendaftaran Berhasil!',
			'infoblock'     => 'Terimakasih atas partisipasi anda.',
			'message'       => 'Terimakasih atas partisipasi anda pada kegiatan PARSIAL 2020',
			'table'			=> ''
		);
		$table_timeline = array(
			'mathcomp' => '<table class="table-striped" cellspacing="0" cellpadding="0"><tbody><tr><td colspan="3" align="center"><strong>Jadwal Mathematics Competition</strong></td></tr><tr><td></td><td><strong>Hari, Tanggal</strong></td><td><strong>Jam</strong></td></tr><tr><td><strong>Babak penyisihan</strong></td><td>Selasa, 10 Maret 2020</td><td>07.15 s/d selesai</td></tr><tr><td><strong>Babak Semifinal</strong></td><td>Rabu, 11 Maret 2020</td><td>07.15 s/d selesai</td></tr><tr><td><strong>Babak final</strong></td><td>Kamis, 12 Maret 2020</td><td>07.15 s/d selesai</td></tr></tbody></table>',
			'mcc' => '<table class="table-striped" cellspacing="0" cellpadding="0"><tbody><tr><td colspan="3" align="center"><strong>Jadwal Mathematics Computation Competition</strong></td></tr><tr><td></td><td><strong>Hari, Tanggal</strong></td><td><strong>Jam</strong></td></tr><tr><td><strong>Babak penyisihan (online)</strong></td><td>1 – 29 Februari 2020</td><td>-</td></tr><tr><td><strong>Babak final</strong></td><td>Jumat, 27 Maret 2020</td><td>13.00 – 17.35 WIB</td></tr></tbody></table>',
			'futsal' => '<table class="table-striped" cellspacing="0" cellpadding="0"><tbody><tr><td colspan="2" align="center"><strong>Jadwal Futsal</strong></td></tr><tr><td></td><td><strong>Tanggal</strong></td></tr><tr><td><strong>IKAHIMATIKA</strong></td><td>21 - 22 Maret 2020</td></tr><tr><td><strong>Mahasiswa Umum</strong></td><td>16 - 19 Maret 2020</td></tr></tbody></table>'
		);

        $data['email'] = $this->input->post('email') ? $this->input->post('email') : 'maftuh.mashuri16@mhs.uinjkt.ac.id';
		$data['subject'] = $this->input->post('subject') ? $this->input->post('subject') : $data['title'];
        $data['message'] = $this->input->post('message') ? $this->input->post('message') : $data['message'];
        $data['name'] = $this->input->post('name') ? $this->input->post('name') : explode('@', $data['email'])[0];
		$data['infoblock'] = $data['subject'] . ' ' . $data['infoblock'];
        $data['title'] = $data['subject'];
        $data['content_slug'] = $this->input->post('content_slug') ? $this->input->post('content_slug') : '';
        $table_checkbox = $this->input->post('add_table');

        if ($table_checkbox)
        {
        	$data['table'] = $table_timeline[$data['content_slug']];
        }
        return $data;
    }
}
