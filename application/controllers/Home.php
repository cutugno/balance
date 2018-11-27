<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		//$this->load->view('home/index');
		$this->load->view('common/scripts');
		$this->load->view('common/close');
	}
}
