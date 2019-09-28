<?php
	class about extends CI_Controller
	{
	  function __construct() {
        parent::__construct();
		$this->output->set_template('default');
		//$this->load->js('assets/jquery-1.9.1.min.js');
    }
	function disclaimer()
	{
		$this->load->view('disclaimer');
	}
	function index()
	{
		$this->load->view('about');
	}
	}
?>