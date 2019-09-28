<?php
		echo form_open(base_url().'result/'.$this->router->fetch_class()); 
?>
<div id="rearea">
<div class="row">
<div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4" style="margin-bottom: 10px;">
<input type="text" name="regno" class="form-control">
</div><div class="col-lg-3 text-md-left">
<input type="submit" placeholder="eg:500363"class="btn btn-primary" name="submit" value="Submit"/>
<a class="btn btn-info" href="<?php echo base_url().'result/'.$this->router->fetch_class().'/compare/'; if (isset($_POST['regno'])) echo $_POST['regno']; ?>">Add to Compare</a>
</div>
</div>
</div>
<?php
if(!$_POST)
{
?>
<style>
	#sname {
    font-family: arial;
    font-size: 30px;
	}
	#scollege {
    font-size: 14px;
    text-transform: capitalize;
	}@media (min-width: 1000px) {
    .text-md-left { text-align: left; }
    .text-md-right { text-align: right; }
    .text-md-center { text-align: center; }
    .text-md-justify { text-align: justify; }
}
</style>
<?php
	$res=$result->result();
	//die(var_dump($res[0]));
	echo '<div class=""><div class="box box-info" style="margin-top:20px">
                <div class="box-header">
                  <h3 class="box-title">Top Marks</h3>
                <div class="box-body">
                  <div class="row">
				  <div class="rankcol col-xs-12 col-md-10 col-sm-10 col-lg-8 col-md-offset-1 col-xs-offset-0 col-sm-offset-1 col-lg-offset-2">
                    <div class="col-xs-12" style="border-bottom: 8px solid #11d691;">
                     <div id="img1" class="col-xs-12 col-sm-4"><img src="'.base_url("assets/img/first.png").'"></div><div style="line-height: 1.5;top: 23px;" id="right" class="rafirst col-xs-12 col-sm-8"><p id="sname">'.$res[0]->name.'</p><p id="scollege">'.$res[0]->cname.'</p><p id="per"><b>'.$res[0]->percent.'%</b></p><p id="total"><b>'.$res[0]->total.'</b>/700</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[1]->name.'</p><p id="scollege">'.$res[1]->cname.'</p><p id="per"><b>'.$res[1]->percent.'%</b></p><p id="total"><b>'.$res[1]->total.'</b>/700</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6"  style="border-left: 8px solid #11d691;">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[2]->name.'</p><p id="scollege">'.$res[2]->cname.'</p><p id="per"><b>'.$res[2]->percent.'%</b></p><p id="total"><b>'.$res[2]->total.'</b>/700</p></div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div></div></div>';
	echo '
	<style>
	.rankcol {
    background: none repeat scroll 0 0 #18f2a9;
    border: 5px solid #11d691;
    padding: 0;
	}
	.rankcol > div {
	  border-radius: 0;
	  padding: 5px;
	}
	#img1 img {
    padding: 4px;
    width: 200px;
	}
	#img1 {
    padding: 0;
	}
	@media only screen and (max-width : 820px) {
		#right{
			top:0 !important;
		}
    }
	</style>	
	';
}else{
if(empty($result))
{ if(!empty($msg))
	echo '<div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>'.$msg.'</p>
            </div>';
}
elseif(!empty($result))
{	
	if($result->pass=='F')
	{
		$result->pass='Fail';
			echo '<div class="callout callout-warning">
              <h4>Sorry !</h4>
              <p>You have to improve !</p>
            </div>';
	}
	else
	{
		$result->pass='Pass';
		echo '<div class="callout callout-success">
              <h4>Congratulations!</h4>
              <p>You are passed !</p>
            </div>';
		}
	//die(print_r($result));
	$values=array("Register Number","Name","Course","College");
	//var_dump($values);
	//echo $subject;
	//var_dump($res);
	//foreach($subject as $s){echo $s->subname;}
	
	$i=4;
	//die(var_dump($subject->result()));
	foreach($subject->result() as $r)
	{ 
		$values[$i]=$r->subname;
		$i++;
	}//die(var_dump($values));
	$values[$i++]="Total";
	$values[$i++]="Pass/Fail";
	$values[$i++]='Percentage';
	$i=0;
	$result->percent=$result->percent.'%';
	$res='';
	$gr=array_fill(0,6,0);
	foreach($result as $v)
	{
		$res.="<tr>";$b=$i>11?'<b>':'';
		$v=is_numeric($v)&&$v<50?'<span class="badge bg-red">'.$v.'</span>':$v;
		$res.= "<td>".$b.$values[$i++]."</td><td> ".$b.$v."</td></tr>";
		if($i>4 && $i<12){
		$v1=$i>10&&$i<=12&&$this->router->fetch_class()=='sem1'?$v*2:$v;
			$gr[0]+=$v1>=90?1:0;
			$gr[1]+=$v1>=80&&$v1<90?1:0;
			$gr[2]+=$v1>=70&&$v1<80?1:0;
			$gr[3]+=$v1>=60&&$v1<70?1:0;
			$gr[4]+=$v1>=50&&$v1<60?1:0;
			$gr[5]+=$v1<50?1:0;
		}
	}
	echo "<table class='table table-striped'><tr>";
	echo "<th>90+</th><th>80+</th><th>70+</th><th>60+</th><th>50+</th><th><50</th><th>Total</th><th>Progress</th><th>Percentage</th></tr><tr>";
	foreach($gr as $g)
		echo "<td>".$g."</td>";
	echo '<td>'.$result->total.'</td><td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: '.$result->percent.'"></div>
                        </div></td><td><span class="badge bg-green">'.$result->percent.'</span></td></tr></table>';
	echo "<table class='table table-hover table-bordered'><tr>";
	echo $res;
	//echo "<td>Percentage </td><td>: ".$per."%";
	echo "</tr></table>";
	//echo "<td>Percentage </td><td>: ".$result->percent."%";
	//print_r($subject);
	//print_r($result);
	if($result->pass=='Fail')
		echo ' <blockquote class="text-left">
      <p>Sometimes by losing a battle you find a new way to win the war.</p>
      <footer><cite title="Do be upset">Donald Trump</cite></footer>
    </blockquote>';
}
}
?>
</form>