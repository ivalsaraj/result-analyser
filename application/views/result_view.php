<?php
if(empty($result))
{
	echo $msg;
}
elseif(!empty($result))
{	
	echo '<div class="callout callout-success">
              <h4>Congratulations!</h4>
              <p>Keep it up !</p>
            </div>';
	//die(print_r($result));
	$values=array("Register Number","Name","Course","College");
	//var_dump($values);
	//echo $subject;
	//var_dump($res);
	//foreach($subject as $s){echo $s->subname;}
	echo "<table class='table table-hover'><tr>";
	$i=4;
	//die(print_r($res2));
	foreach($subject->result() as $r)
	{
		$values[$i]=$r->subname;
		$i++;
	}
	$values[$i++]="Total";
	$values[$i++]="Pass/Fail";
	$values[$i++]='Percentage';
	$i=0;
	$result->percent=$result->percent.'%';
	
	if($result->pass=='F')
		$result->pass='Fail';
	else
		$result->pass='Pass';
	foreach($result as $v)
	{
		echo "<tr>";
		echo "<td>".$values[$i++]."</td>"."<td> ".$v."</td></tr>";
	}
	//echo "<td>Percentage </td><td>: ".$result->percent."%";
	echo "</tr></table>";
	//print_r($subject);
	//print_r($result);
}
?>
