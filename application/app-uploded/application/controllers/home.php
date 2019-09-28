<?php
	class home extends CI_Controller
	{
	  function __construct() {
        parent::__construct();
		$this->output->set_template('default');
		//$this->load->js('assets/jquery-1.9.1.min.js');
    }
	function index()
	{
		$this->load->view('home');
	}
	function err()
	{
		$this->output->unset_template();
		$this->load->view('err');
	}
	}
?>