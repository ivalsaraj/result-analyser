<?php

		echo form_open(base_url().'result/'.$this->router->fetch_class()); 
?>
<div id="rearea">
<div class="row">
<div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4" style="margin-bottom: 10px;">
<input type="text" name="regno" placeholder="eg:501121" class="form-control">
</div><div class="col-lg-3 text-md-left">
<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
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
                  <h3 class="box-title">Overall Top Marks</h3>
                <div class="box-body">
                  <div class="row">
				  <div class="rankcol col-xs-12 col-md-10 col-sm-10 col-lg-8 col-md-offset-1 col-xs-offset-0 col-sm-offset-1 col-lg-offset-2">
                    <div class="col-xs-12" style="border-bottom: 8px solid #11d691;">
                     <div id="img1" class="col-xs-12 col-sm-4"><img src="'.base_url("assets/img/first.png").'"></div><div style="line-height: 1.5;top: 23px;" id="right" class="rafirst col-xs-12 col-sm-8"><p id="sname">'.$res[0]->name.'</p><p id="scollege">'.$res[0]->cname.'</p><p id="per"><b>'.(number_format($res[0]->grandtotal/4000*100,2)).'%</b></p><p id="total"><b>'.$res[0]->grandtotal.'</b>/4000</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[1]->name.'</p><p id="scollege">'.$res[1]->cname.'</p><p id="per"><b>'.(number_format($res[1]->grandtotal/4000*100,2)).'%</b></p><p id="total"><b>'.$res[1]->grandtotal.'</b>/4000</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6"  style="border-left: 8px solid #11d691;">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[2]->name.'</p><p id="scollege">'.$res[2]->cname.'</p><p id="per"><b>'.(number_format($res[2]->grandtotal/4000*100,2)).'%</b></p><p id="total"><b>'.$res[2]->grandtotal.'</b>/4000</p></div>
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
?>

<?php
if(empty($result))
{ if(!empty($msg))
	echo '<div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>'.$msg.'</p>
            </div>';
}
elseif(!empty($result))
{	$resulti = $result;
	if($resulti->overallpass=='F')
	{
		$resulti->overallpass='Fail';
			echo '<div class="callout callout-warning">
              <h4>Sorry !</h4>
              <p>You have to improve in some semester!</p>
			  <p>Supplementary Results are not included in this Result.</p>
            </div>';
	}
	else
	{
		$resulti->overallpass='Pass';
		echo '<div class="callout callout-success">
              <h4>Congratulations!</h4>
              <p>You are passed !</p>
              <p>Overall Percentage : '.number_format(($resulti->grandtotal/4000*100),2).'%</p>
            </div>';
		}
	$i=0;$j=0;//die(var_dump($result1));
	$values1 = '';
	$res1 = '';
	foreach($subject['subsem1'] as $r)
	{ 
		$values1[$i]=$r->subname;
		$i++;
	}
	$add_att=array("Total","Pass/Fail","Percentage");
	$values1 = array_merge($values1,$add_att);
	foreach($result1[0] as $v)
	{
		$res1.="<tr>";
		$res1.= "<td width='50%'>".$values1[$j++]."</td><td> ".$v."</td></tr>";
	}$i=0;$j=0;//die(var_dump($result1));
	$values2 = '';
	$res2 = '';
	foreach($subject['subsem2'] as $r)
	{ 
		$values2[$i]=$r->subname;
		$i++;
	}
	$add_att=array("Total","Pass/Fail","Percentage");
	$values2 = array_merge($values2,$add_att);
	foreach($result2[0] as $v)
	{
		$res2.="<tr>";
		$res2.= "<td width='50%'>".$values2[$j++]."</td><td> ".$v."</td></tr>";
	}$i=0;$j=0;//die(var_dump($result1));
	$values3 = '';
	$res3 = '';
	foreach($subject['subsem3'] as $r)
	{ 
		$values3[$i]=$r->subname;
		$i++;
	}
	$add_att=array("Total","Pass/Fail","Percentage");
	$values3 = array_merge($values3,$add_att);
	foreach($result3[0] as $v)
	{
		$res3.="<tr>";
		$res3.= "<td width='50%'>".$values3[$j++]."</td><td> ".$v."</td></tr>";
	}$i=0;$j=0;//die(var_dump($result1));
	$values4 = '';
	$res4 = '';
	foreach($subject['subsem4'] as $r)
	{ 
		$values4[$i]=$r->subname;
		$i++;
	}
	$add_att=array("Total","Pass/Fail","Percentage");
	$values4 = array_merge($values4,$add_att);
	foreach($result4[0] as $v)
	{
		$res4.="<tr>";
		$res4.= "<td width='50%'>".$values4[$j++]."</td><td> ".$v."</td></tr>";
	}$i=0;$j=0;//die(var_dump($result1));
	$values5 = '';
	$res5 = '';
	foreach($subject['subsem5'] as $r)
	{ 
		$values5[$i]=$r->subname;
		$i++;
	}
	$add_att=array("Total","Pass/Fail","Percentage");
	$values5 = array_merge($values5,$add_att);
	foreach($result5[0] as $v)
	{
		$res5.="<tr>";
		$res5.= "<td width='50%'>".$values5[$j++]."</td><td> ".$v."</td></tr>";
	}
	$i=0;$j=0;
	$values = '';
	foreach($subject['subsem6'] as $r)
	{ 
		$values[$i]=$r->subname;
		$i++;
	}//die(var_dump($values));
	$add_att=array("Total","Grand Total","Pass/Fail","Percentage");
	$values = array_merge($values,$add_att);
	//$gr=array_fill(0,6,0);
	$res = '';
	foreach($resulti as $v)
	{
		$res.="<tr>";
		$res.= "<td width='50%'>".$values[$j++]."</td><td> ".$v."</td></tr>";
		/*if($i>4 && $i<7){
			$gr[0]+=$v>=90?1:0;
			$gr[1]+=$v>=80&&$v<90?1:0;
			$gr[2]+=$v>=70&&$v<80?1:0;
			$gr[3]+=$v>=60&&$v<70?1:0;
			$gr[4]+=$v>=50&&$v<60?1:0;
			$gr[5]+=$v<50?1:0;
		}*/
	}
	//die(var_dump($values));
	$resulti->percent=$resulti->percent.'%';
	$resmain='';
	$resmain='</div></div><div class="box">
                <div class="box-header">
                  <h3 class="box-title">Student Overall Marklist</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>';
		$resmain.="<tr><td width='50%'>Register Number</td><td>".$student['regno']."</td></tr>";
		$resmain.="<tr><td>Name</td><td>".$student['name']."</td></tr>";
		$resmain.="<tr><td>Course</td><td>".$student['course']."</td></tr>";
		$resmain.="<tr><td>College</td><td>".$student['cname']."</td></tr>";
    $resmain.='</tbody></table>
                </div><!-- /.box-body -->
              </div><p style="text-align: center;font-style: italic;font-family: Times New Roman;">Click Semster Title To Expand</p>';
	echo $resmain;
	/*echo "<table class='table table-striped'><tr>";
	echo "<th>90+</th><th>80+</th><th>70+</th><th>60+</th><th>50+</th><th><50</th><th>Total</th><th>Progress</th><th>Percentage</th></tr><tr>";
	foreach($gr as $g)
		echo "<td>".$g."</td>";
	echo '<td>'.$resulti->total.'</td><td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: '.$resulti->percent.'"></div>
                        </div></td><td><span class="badge bg-green">'.$resulti->percent.'</span></td></tr></table>';*/
	echo '<div class="results"><ul>';
	echo '<li><a href="#accordion1" class="accordion-trigger" data-accord-group="group1">Semester I<span>Total : '.$result1[0]->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$result1[0]->percent.'%</span></a><div id="accordion1" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo $res1;
	echo "</table></div></li>";
	echo '<li><a href="#accordion2" class="accordion-trigger" data-accord-group="group1">Semester II<span>Total : '.$result2[0]->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$result2[0]->percent.'%</span></a><div id="accordion2" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo $res2;
	echo "</table></div></li>";
	echo '<li><a href="#accordion3" class="accordion-trigger" data-accord-group="group1">Semester III<span>Total : '.$result3[0]->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$result3[0]->percent.'%</span></a><div id="accordion3" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo $res3;
	echo "</table></div></li>";
	echo '<li><a href="#accordion4" class="accordion-trigger" data-accord-group="group1">Semester IV<span>Total : '.$result4[0]->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$result4[0]->percent.'%</span></a><div id="accordion4" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo $res4;
	echo "</table></div></li>";
	echo '<li><a href="#accordion5" class="accordion-trigger" data-accord-group="group1">Semester V<span>Total : '.$result5[0]->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$result5[0]->percent.'%</span></a><div id="accordion5" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo $res5;
	echo "</table></div></li>";
	echo '<li><a href="#accordion6" class="accordion-trigger expanded" data-accord-group="group1" aria-expanded="true">Semester VI<span>Total : '.$resulti->total.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.$resulti->percent.'</span></a><div id="accordion6" class="accordion-content collapsed"><table style="font-weight: bold" class="table table-hover table-bordered">';
	echo $res;
	echo "</table></div></li>";
	if($resulti->grandtotal==0){
	$resulti->grandtotal=$result1[0]->total+$result2[0]->total+$result3[0]->total+$result4[0]->total+$result5[0]->total+$resulti->total;
	$resulti->percent=$resulti->grandtotal/4000*100;
	}
	echo '<li><a href="#accordion6" class="accordion-trigger" data-accord-group="group1">Overall Result<span>Total : '.$resulti->grandtotal.'&nbsp;&nbsp; | &nbsp;&nbsp;Percentage : '.($resulti->grandtotal/4000*100).'%</div></span></a><div id="accordion7" class="accordion-content collapsed"><table class="table table-hover table-bordered">';
	echo "</table></div></li></ul></div>";
	//echo "<td>Percentage </td><td>: ".$resulti->percent."%";
	//print_r($subject);
	//print_r($resulti);
	if($resulti->overallpass=='Fail')
		echo ' <blockquote class="text-left">
      <p>Sometimes by losing a battle you find a new way to win the war.</p>
      <footer><cite title="Do be upset">Donald Trump</cite></footer>
    </blockquote>';
}
?>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6 e=1N;6 K=1Z;6 1j=5;6 g=j h("#1P","#1T","#1Y","#1W","#1L","#1K","#1y");6 L=j h();6 B=j h();6 y=j h();6 s=j h();6 l=j h();6 w=j h();6 F=j h();6 c=j h();6 o=j h();6 O=1i;6 Q=1o;6 d;8(1b(\'18\')!=\'f\')f 18(1c){6 G=S.1e;8(1b(G)!=\'f\')S.1e=1c;q S.1e=f(){8(G)G();1c()}}18(1m);f 1m(){8(a.1E){6 i;d=a.1q("p");d.9.1r="1G";d.9.V="1l";d.9.17="1l";d.9.1J="11";d.9.1I="1k";d.9.1D="1k";d.9.1f="1g";a.t.H(d);1a();P(i=0;i<1j;i++){1n(i);14(i);1A(\'1t(\'+i+\')\',K)}}}f 1n(N){6 i,1z,1B;c[N+\'r\']=W(\'|\',12);d.H(c[N+\'r\']);P(i=e*N;i<e+e*N;i++){c[i]=W(\'*\',13);d.H(c[i])}}f W(1h,1p){6 p=a.1q("p");p.9.1S=1p+"E 1U";p.9.1r="1X";p.9.1f="1g";p.H(a.1M(1h));1O(p)}f 14(N){y[N]=b.X(b.k()*g.C);s[N+"r"]=O*0.5;l[N+"r"]=Q-5;L[N]=b.1R((0.5+b.k())*Q*0.4);w[N+"r"]=(b.k()-0.5)*O/L[N];8(w[N+"r"]>1.J)c[N+"r"].19.Y="/";q 8(w[N+"r"]<-1.J)c[N+"r"].19.Y="\\\\";q c[N+"r"].19.Y="|";c[N+"r"].9.I=g[y[N]]}f 10(N){6 i,Z,A=0;P(i=e*N;i<e+e*N;i++){Z=c[i].9;Z.17=s[i]+"E";Z.V=l[i]+"E";8(o[i])o[i]--;q A++;8(o[i]==15)Z.1d="1x";q 8(o[i]==7)Z.1d="1Q";q 8(o[i]==1)Z.T="1s";8(o[i]>1&&b.k()<.1){Z.T="1s";1u(\'c[\'+i+\'].9.T="11"\',K-1)}s[i]+=w[i];l[i]+=(F[i]+=1.J/B[N])}8(A!=e)1u("10("+N+")",K)}f 1t(N){6 i,M,Z;6 1w=s[N+"r"];6 1v=l[N+"r"];s[N+"r"]+=w[N+"r"];l[N+"r"]-=4;8(l[N+"r"]<L[N]){M=b.X(b.k()*3*g.C);B[N]=5+b.k()*4;P(i=N*e;i<e+e*N;i++){s[i]=s[N+"r"];l[i]=l[N+"r"];F[i]=(b.k()-0.5)*B[N];w[i]=(b.k()-0.5)*(B[N]-b.1V(F[i]))*1.J;o[i]=16+b.X(b.k()*16);Z=c[i];8(M<g.C)Z.9.I=g[i%2?y[N]:M];q 8(M<2*g.C)Z.9.I=g[y[N]];q Z.9.I=g[i%g.C];Z.9.1d="1H";Z.9.T="11"}10(N);14(N)}c[N+"r"].9.17=1w+"E";c[N+"r"].9.V=1v+"E"}S.1C=1a;f 1a(){6 m=R;6 n=R;8(a.x&&a.x.v){8(a.x.v>0)m=a.x.v;8(a.x.z>0)n=a.x.z}8(1b(u.D)!="1F"&&u.D){8(u.D>0&&u.D<m)m=u.D;8(u.U>0&&u.U<n)n=u.U}8(a.t.v){8(a.t.v>0&&a.t.v<m)m=a.t.v;8(a.t.z>0&&a.t.z<n)n=a.t.z}8(m==R||n==R){m=1i;n=1o}O=m;Q=n}',62,124,'||||||var||if|style|document|Math|stars|boddie|bits|function|colours|Array||new|random|Ypos|sw_min|sh_min|decay|div|else||Xpos|body|self|clientWidth|dX|documentElement|colour|clientHeight||intensity|length|innerWidth|px|dY|oldonload|appendChild|color|25|speed|bangheight|||swide|for|shigh|999999|window|visibility|innerHeight|top|createDiv|floor|nodeValue||bang|visible|||launch|||left|addRVLoadEvent|firstChild|set_width|typeof|funky|fontSize|onload|backgroundColor|transparent|char|800|bangs|1px|0px|light_blue_touchpaper|write_fire|600|size|createElement|position|hidden|stepthrough|setTimeout|oldy|oldx|7px|f0c|rlef|setInterval|rdow|onresize|height|getElementById|undefined|fixed|13px|width|overflow|f93|0cf|createTextNode|80|return|03f|2px|round|font|f03|monospace|abs|93f|absolute|0e0|33'.split('|'),0,{}))
</script>
<script src="<?php echo base_url('assets/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/QuickAccord.min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/QuickAccord.css') ?>">
<script>
$(".accordion-trigger").QuickAccord();
</script>
<style>
.accordion-trigger span {
    float: right;
    margin-right: 22px;
	color:#fff;
}
</style>
<?php
}
?>
</form>