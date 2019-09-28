<?php
if(isset($clg))
{
	echo form_open();
	echo "<table><tr><td>";
	echo "<select name='college'  class='form-control'>";
	echo "<option value='-1'>Select your College</option>";
	foreach($clg->result() as $c)
	{
		echo "<option value='".$c->cid."'>".$c->cname."</option>";
	}
	echo "</td><td><input type='submit' value='Get Result' name='submit' class='btn btn-primary'/></td></tr></table>";
	echo '</form>';
}
?>
		<div class="callout callout-info">
                    <h4>Click Table header to sort !</h4>
                    <p>eg: click a Subject name to sort subject wise, click again to sort in descending order.
		</p>
		</div>
<?php
/*function short_subjects($su)
{	$i=0;
$acronym = "";
	foreach($su as $s1)
	{
	$s = explode(" ", $s1->subname);
	$s = array_slice($s,2);
	$acronym = "";
//die(print_r($s));
	foreach ($s as $w) {
	  $acronym .= $w[0];
	}
	$subs[++$i]=$acronym;
	}
	die(var_dump($subs));
}
*/
if(isset($result) && !empty($result))
{ //$sub=short_subjects($subject);
	$sl=isset($clg)?"Sl.No.":"Rank";
	if($this->router->fetch_class()=='sem1')
	$values=array($sl,"Register Number","Name","Course","College","MFCS","DS","CO","PM","C","C Lab","PCH Lab","English");
	else if($this->router->fetch_class()=='sem2')
	$values=array($sl,"Register Number","Name","Course","College","P&S","DS","MP","OS","C++","C++ Lab","DS Lab");
	else if($this->router->fetch_class()=='sem3')
	$values=array($sl,"Register Number","Name","Course","College","Java","SE","SS","DBMS","DC","Java Lab","DBMS Lab");
	else if($this->router->fetch_class()=='sem4')
	$values=array($sl,"Register Number","Name","Course","College","OR","CN","Linux","OOMD","Linux Lab","PHP Lab","Elective");
	else if($this->router->fetch_class()=='sem5')
	$values=array($sl,"Register Number","Name","Course","College","CS","ITDA","CG","DM","Elective II","CG Lab","Seminar","Mini Project");
	else if($this->router->fetch_class()=='sem6')
	$values=array($sl,"Register Number","Name","Course","College","Project","Viva Voce");
	else if($this->router->fetch_class()=='overall')
	$values=array($sl,"Register Number","Name","Course","College","Project","Viva Voce");
	$i=13;
	$values[$i++]="Total";
	if($this->router->fetch_class()=='overall')
		$values[$i++]="GrandTotal";
	$values[$i++]="Pass/Fail";
	$values[$i++]='Percentage';
	$i=0;
	$f=0;
	$clgtotal=$result->num_rows();
	if(isset($clg))
	echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    <h4><i class="icon fa fa-info">#</i> College Name:
                  '.$result->row()->cname.' </h4> Total Students : '.$result->num_rows().' </div>';
	$op='';
	$op.= "<table class='table table-hover table-bordered tablesort dataTable'><thead><tr>";
	
	foreach($values as $v)
		$op.= "<th>".$v."</th>";
	$op.= "</thead>";
	$j=1;
	foreach($result->result() as $res)
	{ //print_r($res);
			if($res->pass=='F') {$res->pass="<span class='badge bg-red'>".$res->pass."</span>";$f++;}
	$op.= "<tr><td>".$j++."</td>";
	//die(var_dump($res));
	$v1=0;
	$i=0;
	foreach($res as $v)
	{
		$v1 = $v;
		$v1 = ($i==9||$i==10)?$v1*2:$v1;
		if(is_numeric($v1) && $v1<50) {$v="<span class='badge bg-info'>".$v."</span>";}
		$op.= "<td>".$v."</td>";
		$i++;
	}//die(var_dump($res));
	$op.= "</tr>";
	}
	$op.= "</table>";
	//college calculate percentage
	$clgpass=$clgtotal-$f;
	$clgpercent=number_format(($clgpass)/$clgtotal*100,2);
	//college statistics print
	echo "<table class='table table-striped table-bordered'><tr>";
	echo "<th>Total Students</th><th>Total Pass</th><th>Failures</th><th>Progress</th><th>Percentage</th><th>Compare college</th></tr><tr>";
	echo "<td>".$clgtotal."</td><td>".$clgpass."</td><td>".$f."</td>";
	echo '<td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: '.$clgpercent.'%"></div>
                        </div></td><td><span class="badge bg-green">'.$clgpercent.'%</span></td><td><a href="#clgcompare" class="btn btn-primary">Compare</a></td></tr></table>';
	//print college result
	echo $op;
	echo "Students with same marks are treated with alphabetical order of their names !";
	}
?>
<script>
$(function(){
  $(".tablesort").tablesorter();
  $('.tablesort').filterTable();
  $(".table").stickyTableHeaders();
});
</script>
<style>
.filter-table .quick { margin-left: 0.5em; font-size: 0.8em; text-decoration: none; }
.fitler-table .quick:hover { text-decoration: underline; }
td.alt {
    background-color: rgba(24, 242, 169, 0.57);
}
p.filter-table input {
  border: 1px solid #eee;
  padding: 5px;
}
p.filter-table {
  margin: 10px 0;
}
.table thead{
	background: #eee;
	top:0;
}
</style>