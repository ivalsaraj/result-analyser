<?php
if(empty($result1))
{
	echo $msg;
}
elseif(!empty($result1))
{	
?>
	</div></div>
<?php
	echo "<table style='margin-bottom: 12px;' width='100%'><tr>";
	$i=0;
	$res2=array();
	$j=0;
	//die(print_r($result1));
	foreach($subject->result() as $r)
	{
		$subjects[$i]=$r->subname;
		$i++;
	}
	//$result1->percent=$result1->percent.'%';
	$result2->percent=$result2->percent.'%';
	$perd=number_format($result1->percent-$result2->percent,2);
	if($perd>0)
	{	$btmsg=ucwords(strtolower( $result1->name))." has ".abs($perd)."% higher !";
		$grad1="gradient: ['#62CFD1', '#75E1E4']";
		$grad2="gradient: ['#ff1e41', '#ff5f43']";
	}
	else if($perd==0)
		$btmsg="Both Have same Percentage of marks !";
	else
	{	$btmsg=ucwords(strtolower( $result2->name))." has ".abs($perd)."% higher !";
		$grad2="gradient: ['#62CFD1', '#75E1E4']";
		$grad1="gradient: ['#ff1e41', '#ff5f43']";
	}
	?>
	<?php
	echo '<td>
	<div id="result1"><p id="sname">'.$result1->name.'</p>
	<p id="scollege">'.strtolower($result1->cname).'</p>
	<p id="spercent"><div id="circle1"><strong></strong></div></p>
	<p id="stotal"><b>'.$result1->total.'</b>/700</p>
	</div>
	</td>
	<td>
	<div id="result2"><p id="sname">'.$result2->name.'</p>
	<p id="scollege">'.strtolower($result2->cname).'</p>
	<p id="spercent"><div id="circle2"><strong></strong></div></p>
	<p id="stotal"><b>'.$result2->total.'</b>/700</p>
	</div>';
	?>
	<style type="text/css">
	#sname {
    font-family: arial;
    font-size: 30px;
	}
	#scollege {
    font-size: 14px;
    text-transform: capitalize;
	}
	#result1{
		text-align:center;
	}#result2{
		text-align:center;
	}
	#circle1,#circle2{
		position:relative;
	}
	#circle1 strong,#circle2 strong {
    font-size: 40px;
    left: 8px;
    line-height: 47px;
    position: absolute;
    text-align: center;
    top: 50px;
    width: 100%;
}
	</style>
	<script>
	$(function(){
	$('#circle1').circleProgress({
        value: <?php echo $result1->percent/100; ?>,
        size: 150,
        fill: {
            <?php echo $grad1; ?>
        }
    }).on('circle-animation-progress', function(event, progress, stepValue) {
    $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
});
	$('#circle2').circleProgress({
        value: <?php echo $result2->percent/100; ?>,
        size: 150,
        fill: {
            <?php echo $grad2; ?>
        }
    }).on('circle-animation-progress', function(event, progress, stepValue) {
    $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
});
	});
	</script>
	
	<?php
	echo "</td></tr>";
	echo "<tr><td colspan='3' style='text-align: center; font-weight: bold;'>".$btmsg."</td></tr>";
	echo "</tr></table>";
	?>
<div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Results</h3>
              </div>
              <div class="box-body">
	<?php
	$j=0;
	foreach($result2 as $r2)
	{
		$res2[$j]=$r2;
		$j++;
	}
	$j=0;
	foreach($result1 as $r1)
	{
		$res1[$j]=$r1;
		$j++;
	}
	$i=4;
	echo "<table class='table' width='100%'>";
	foreach($subjects as $s)
	{	$ototal=$i>9?50:100;
		$owidth1=$i>9?$res1[$i]*2:$res1[$i];
		$owidth2=$i>9?$res2[$i]*2:$res2[$i];
		if($res1[$i]-$res2[$i]==0)
		$opercent='<p class="text-green">same marks</p>';
		else
		$opercent=$res1[$i]-$res2[$i]>0?'<p class="text-green">'.abs($res1[$i]-$res2[$i]).' marks high</p>':'<p class="text-yellow">'.abs($res1[$i]-$res2[$i]).' marks less</p>';
		echo "<tr><td width='30%'>".$s.
		'</td><td width="30%">  <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'
		.$res1[$i].'"aria-valuemin="0" aria-valuemax="100" style="width:'.$owidth1.'%">'.$res1[$i].'</div></div></td>
		<td width="10%">'.$opercent.'</td>
		<td width="30%">  <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'.$res2[$i].'"aria-valuemin="0" aria-valuemax="'.$ototal.'" style="width:'.$owidth2.'%">'.$res2[$i].'</div></div></td></tr>';
		$i++;
	}

	echo "</table>";

}
?>