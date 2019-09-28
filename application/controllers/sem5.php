<?php
	class Sem5 extends CI_Controller
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
		//$this->load->view('getresult',$data);
	}
	function about()
	{
		$this->output->set_meta('description',"About");
		$this->load->view('about');
	}
	function compare($reg1=null)
	{
		$this->db->cache_off();
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/circle-progress.js');
		$this->output->set_meta('title','Compare Results');
		$this->output->set_meta('description','Compare Results with friends');
		$regres1=null;
		$regres2=null;
		$msg='';
		$subject='';
		$resview='';
		if($this->input->post())
		{
			$this->load->model('storeresult5');
			$regs1=$this->input->post('reg1');
			$regs2=$this->input->post('reg2');
			$regres1=$this->storeresult5->get_marks($regs1);
			$regres2=$this->storeresult5->get_marks($regs2);
			$subject=$this->storeresult5->get_subjects();
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
		$this->load->js('assets/jquery.stickytableheaders.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('title','Top20 Ranks');
		$this->output->set_meta('description','Top20 Ranks in Semester V');
		$this->load->model('storeresult5');
		$result=$this->storeresult5->allmarks(20);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function top50()
	{
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->load->js('assets/jquery.stickytableheaders.min.js');
		$this->output->set_meta('title','Top50 Ranks');
		$this->output->set_meta('description','Top50 Ranks in Semester V');
		$this->load->model('storeresult5');
		$result=$this->storeresult5->allmarks(50);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function top10()
	{
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.stickytableheaders.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('title','Top10 Ranks');
		$this->output->set_meta('description','Top10 Ranks in Semester V');
		$this->load->model('storeresult5');
		$result=$this->storeresult5->allmarks(10);
		$this->load->view('topmarklistview',array('result'=>$result));
	}
	function myrank()
	{	
		$this->db->cache_off();
		$this->load->model('storeresult5');
		$result='';
		$msg='';
		$this->output->set_meta('title','My Global Rank');
		$this->output->set_meta('description','Check your global rank of Semester V');
		if($this->input->post())
		{
			$id=$this->input->post('regno');
			$result=$this->storeresult5->getmyrank($id)->row();
			if(empty($result)) $msg='Invalid Register Number';
		}
		$this->load->view('myrank',array('result'=>$result,'msg'=>$msg));
	}
	function subjectwiserank()
	{
		$result='';
		$subject='';
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->load->js('assets/jquery.stickytableheaders.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->output->set_meta('title','Subject Wise Ranks');
		$this->output->set_meta('description','Subject Wise Ranks of Semester V');
		$this->load->model('storeresult5');
		$sub=$this->storeresult5->get_subjects()->result();
		//die(var_dump($sub));
		if($this->input->post())
		{
			//$this->load->model('storeresult5');
			$id=$this->input->post('subject');
			if($id!=-1)
			$result=$this->storeresult5->subjectwiserank($id);
			//die(print_r($sub[substr($id,-1)-1]->subname));
			$subject=$sub[substr($id,-1)-1]->subname;
		//die(var_dump($result));
		}
		$this->load->view('subjectwiselistview_sem5',array('result'=>$result,'sub'=>$sub,'subject'=>$subject));
	}
	function mycollege()
	{
		$result='';
		$subject='';
		$this->load->js('assets/jquery-1.9.1.min.js');
		$this->load->js('assets/jquery.tablesorter.min.js');
		$this->load->js('assets/jquery.stickytableheaders.min.js');
		$this->load->js('assets/jquery.filtertable.min.js');
		$this->output->set_meta('title','My College Result');
		$this->output->set_meta('description','Your College Results in Semester IV');
		$this->load->model('storeresult5');
		$clg=$this->storeresult5->getcollege();
		//die(print_r($result));
		if($this->input->post())
		{
			$this->load->model('storeresult5');
			$id=$this->input->post('college');
			if($id!=-1)
			$result=$this->storeresult5->getcollegeresult($id);
			$subject=$this->storeresult5->get_subjects()->result();
		}
		$this->load->view('topmarklistview',array('clg'=>$clg,'result'=>$result,'subject'=>$subject));
	}
	function topmark()
	{
		$this->output->set_meta('title','Rank holder - Top mark');
		$this->output->set_meta('description','Rank holder - Top mark in Semester V');
		$this->load->model('storeresult5');
		$result=$this->storeresult5->allmarks(1)->row();
		//die(print_r($res));
		//$result=$this->storeresult5->get_marks($res->regno);
		$subject=$this->storeresult5->get_subjects();
		//$this->output->cache(2);
		$this->load->view('result_view',array('result'=>$result,'subject'=>$subject,'msg'=>''));
		//$this->load->view('result_regno');
	}
	function changelog()
	{
		$this->output->set_meta('description',"Change Log");
		$this->load->view('changelog');
	}
	function index()
	{
		$this->output->set_meta('title','Student Result');
		$this->output->set_meta('description','MCA Semester V Results');
		$this->db->cache_off();
		$result='';
		$subject='';
		$msg='';
		$this->load->model('storeresult5');
		if($this->input->post())
		{
		$data=$this->input->post('regno');
		$result=$this->storeresult5->get_marks($data);
		//die(var_dump($result));
		if(empty($result)) $msg='Invalid Register Number';
		$subject=$this->storeresult5->get_subjects();
		}else
		{
			$this->db->cache_on();
			$result=$this->storeresult5->allmarks(4);
		}
		$this->load->view('result_regno_sem5',array('result'=>$result,'subject'=>$subject,'msg'=>$msg));
	}
	}
?>