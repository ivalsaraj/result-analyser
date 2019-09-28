<?php
	class Storeresult6 extends CI_Model
	{
		function get_subjects()
		{
		return $this->db->get_where('subject',array('sem'=>$this->router->fetch_class()));
		}
		function get_marks($data)
		{	//handled sql injection
			$condition=sprintf("regno ='%s'",mysql_real_escape_string($data));
			//$condition="regno =" . "'" . $data . "'";
			$this->db->select('regno, name, course, college.cname, mca101, mca102, total, pass, percent');
			$this->db->from('student6');
			$this->db->where($condition);
			$this->db->limit(1);
			$this->db->join('college', 'college.cid = student6.college','left');
			$result=$this->db->get()->row();
				return $result;
			
		}
		function getsubject($id)
		{
			
		}
		function subjectwiserank($id)
		{
			$id=sprintf("%s",mysql_real_escape_string($id));
			$query1="select regno, name, course, college.cname, mca101, mca102,  total, pass, percent from student6 JOIN college ON college.cid=student6.college ORDER BY ".$id." DESC, name limit 50";
			//die($query1);
			return $this->db->query($query1);
			
		}
		function getmyrank($id)
		{
			$id=sprintf("'%s'",mysql_real_escape_string($id));
			$query1="set @row_number:=0";
			$query2="select * from 
					(select regno,name,college.cname,total,pass,percent, @row_number:=@row_number+1 as rank from student6 JOIN college ON college.cid=student6.college order by total desc,name) 
					as row_to_return where regno=".$id;
			$this->db->query($query1);
			return $this->db->query($query2);
		}
		function getcollegeresult($id)
		{
			$this->db->select('regno, name, course, college.cname, mca101, mca102, total, pass, percent');
			$this->db->from('student6');
			$this->db->where('cid',$id);
			$this->db->order_by('regno','ASC');
			$this->db->join('college', 'college.cid = student6.college','left');
			//$this->db->select_max('total');
			return $this->db->get();
		}
		function getcollege()
		{
			return $this->db->query("select *from college");
			//return $this->db->get();
		}
		function allmarks($limit)
		{
			//$this->db->cache_on();
			$query1="select regno, name, course, college.cname, mca101, mca102,  total, pass, percent from student6 JOIN college ON college.cid=student6.college ORDER BY total DESC, name limit ".$limit;
			return $this->db->query($query1);
		}
		function allmarks_overall($limit)
		{
			//$this->db->cache_on();
			$query1="select regno, name, course, college.cname, mca101, mca102,  total, grandtotal, pass, percent from student6 JOIN college ON college.cid=student6.college ORDER BY grandtotal DESC, name limit ".$limit;
			return $this->db->query($query1);
		}

	}
?>