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
		$this->output->set_meta('title','MCA Result Analyser 2016');
		$this->output->set_meta('description','Check your MCA Results, Overall College Results, Compare Marks etc. here.');
	}
	function fetch($first,$last)
	{ //call this function,
		$data['first']=$first;
		$data['last']=$last;
		$this->load->view('getresult',$data);
	}
	function changelog()
	{
		$this->output->set_meta('description',"Change Log");
		$this->load->view('changelog');
	}
	function about()
	{
		$this->output->set_meta('description',"About");
		$this->load->view('about');
	}
	function err()
	{
		header("HTTP/1.0 404 Not Found");die();
		$this->output->unset_template();
		$this->load->view('err');
	}
	}
?>