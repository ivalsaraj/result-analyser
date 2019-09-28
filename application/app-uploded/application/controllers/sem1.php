<?php
	class sem1 extends CI_Controller
	{
	  function __construct() {
        parent::__construct();
		$this->output->set_template('default');
		//$this->load->js('assets/jquery-1.9.1.min.js');
    }
	function fetch($first,$last)
	{ //call this function,
		$data['first']=$first;
		$data['last']=$last;
		$this->load->view('getresult',$data);
	}
	function compare($reg1=null)
	{
		$this->db->cache_off();
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/circle-progress.js');
		$this->output->set_meta('description','Compare Results');
		$regres1=null;
		$regres2=null;
		$msg='';
		$subject='';
		$resview='';
		if($this->input->post())
		{
			$this->load->model('storeresult');
			$regs1=$this->input->post('reg1');
			$regs2=$this->input->post('reg2');
			$regres1=$this->storeresult->get_marks($regs1);
			$regres2=$this->storeresult->get_marks($regs2);
			$subject=$this->storeresult->get_subjects();
			if(empty($regres1) || empty($regres2)) $msg='Invalid Register Number';
			else{
			//die(print_r($regres1).' '.print_r($regres2));
			$resview=$this->load->view('result_view_compare',array('result1'=>$regres1,'result2'=>$regres2,'subject'=>$subject,'msg'=>$msg),true);
			}
		}
		$this->load->view("compare",array('resview'=>$resview,'reg1'=>$reg1,'msg'=>$msg));
	}
	function top20()
	{
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('description','Top20 Ranks');
		$this->load->model('storeresult');
		$result=$this->storeresult->allmarks(20);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function top50()
	{
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('description','Top50 Ranks');
		$this->load->model('storeresult');
		$result=$this->storeresult->allmarks(50);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function top10()
	{
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('description','Top10 Ranks');
		$this->load->model('storeresult');
		$result=$this->storeresult->allmarks(10);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function myrank()
	{	
		$this->db->cache_off();
		$this->load->model('storeresult');
		$result='';
		$msg='';
		if($this->input->post())
		{
			$id=$this->input->post('regno');
			$result=$this->storeresult->getmyrank($id)->row();
			if(empty($result)) $msg='Invalid Register Number';
		}
		$this->load->view('myrank',array('result'=>$result,'msg'=>$msg));
	}
	function mycollege()
	{
		$result='';
		$subject='';
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->output->set_meta('description','My College Result');
		$this->load->model('storeresult');
		$clg=$this->storeresult->getcollege();
		//die(print_r($result));
		if($this->input->post())
		{
			$this->load->model('storeresult');
			$id=$this->input->post('college');
			if($id!=-1)
			$result=$this->storeresult->getcollegeresult($id);
			$subject=$this->storeresult->get_subjects()->result();
		}
		$this->load->view('topmarklistview',array('clg'=>$clg,'result'=>$result,'subject'=>$subject));
	}
	function topmark()
	{
		$this->output->set_meta('description','Rank holder - Top mark');
		$this->load->model('storeresult');
		$result=$this->storeresult->allmarks(1)->row();
		//die(print_r($res));
		//$result=$this->storeresult->get_marks($res->regno);
		$subject=$this->storeresult->get_subjects();
		//$this->output->cache(2);
		$this->load->view('result_view',array('result'=>$result,'subject'=>$subject,'msg'=>''));
		//$this->load->view('result_regno');
	}
	function index()
	{
		$this->output->set_meta('description','Student Result');
		$this->db->cache_off();
		$result='';
		$subject='';
		$msg='';
		$this->load->model('storeresult');
		if($this->input->post())
		{
		$data=$this->input->post('regno');
		$result=$this->storeresult->get_marks($data);
		if(empty($result)) $msg='Invalid Register Number';
		$subject=$this->storeresult->get_subjects();
		}else
		{
			$this->db->cache_on();
			$result=$this->storeresult->allmarks(4);
		}
		$this->load->view('result_regno',array('result'=>$result,'subject'=>$subject,'msg'=>$msg));
	}
	}
?>