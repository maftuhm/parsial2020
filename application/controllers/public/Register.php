<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->title = 'MCC';
        $this->data['required'] = lang('form_required');
		$this->form_validation->set_message('is_unique', '{field} ' . set_value('email') . ' sudah terdaftar.');
		$this->data['name'] = array(
			'name'  => 'name',
			'type'  => 'text',
			'class'	=> 'input100',
            'placeholder' => lang('placeholder_name')
		);
		$this->data['address'] = array(
			'name'  => 'address',
			'cols'	=> '40',
			'rows' 	=> '3',
			'class'	=> 'input100',
            'placeholder' => lang('placeholder_address'),
            'value'	=> $this->form_validation->set_value('address')
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'type'  => 'email',
			'class'	=> 'input100',
            'placeholder' => lang('placeholder_email'),
            'value'	=> $this->form_validation->set_value('email')
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'type'  => 'tel',
            'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
			'class'	=> 'input100',
            'placeholder' => lang('placeholder_phone'),
            'value'	=> $this->form_validation->set_value('phone')
		);
		$this->data['accept'] = array(
			'name'  => 'accept',
			'class'    => 'checkbox',
			'type'  => 'checkbox',
            'checked'	=> set_checkbox('accept')
		);
		$this->data['school'] = array(
			'name'  => 'school',
			'type'  => 'text',
			'class'	=> 'input100',
            'placeholder' => lang('placeholder_school'),
            'value'	=> $this->form_validation->set_value('school')
		);
		$this->data['birthplace'] = array(
			'name'  => 'birthplace',
			'type'  => 'text',
            'placeholder' => lang('placeholder_city'),
			'class'	=> 'input100',
            'value'	=> $this->form_validation->set_value('birthplace')
		);
    }
    public function mcc($value='')
    {
        $this->template->public_form_render('public/mcc', $this->data);
	}
}

