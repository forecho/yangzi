<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		//$this->load->model('model');
	}
	
	function index(){	
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
		// $this->load->view('demo.html');
	}
}
