<?php

		echo form_open(base_url().'result/'.$this->router->fetch_class()); 
?>
<div id="rearea">
<div class="row">
<div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4" style="margin-bottom: 10px;">
<input type="text" placeholder="eg:500363" name="regno" class="form-control">
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
	$resall=$result_overall->result();
	//die(var_dump($res[0]));
	echo '<div class=""><div class="box box-info" style="margin-top:20px">
                <div class="box-header">
                  <h3 class="box-title">Top Marks in VI<sup>th</sup> Semester</h3>
                <div class="box-body">
                  <div class="row">
				  <div class="rankcol col-xs-12 col-md-10 col-sm-10 col-lg-8 col-md-offset-1 col-xs-offset-0 col-sm-offset-1 col-lg-offset-2">
                    <div class="col-xs-12" style="border-bottom: 8px solid #11d691;">
                     <div id="img1" class="col-xs-12 col-sm-4"><img src="'.base_url("assets/img/first.png").'"></div><div style="line-height: 1.5;top: 23px;" id="right" class="rafirst col-xs-12 col-sm-8"><p id="sname">'.$res[0]->name.'</p><p id="scollege">'.$res[0]->cname.'</p><p id="per"><b>'.$res[0]->percent.'%</b></p><p id="total"><b>'.$res[0]->total.'</b>/500</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[1]->name.'</p><p id="scollege">'.$res[1]->cname.'</p><p id="per"><b>'.$res[1]->percent.'%</b></p><p id="total"><b>'.$res[1]->total.'</b>/500</p></div>
                    </div>
                    <div class="col-xs-12 col-sm-6"  style="border-left: 8px solid #11d691;">
                      <div id="img1"></div><div id="right"><p id="sname">'.$res[2]->name.'</p><p id="scollege">'.$res[2]->cname.'</p><p id="per"><b>'.$res[2]->percent.'%</b></p><p id="total"><b>'.$res[2]->total.'</b>/500</p></div>
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
		$res.="<tr>";$b=$i>5?'<b>':'';
		$res.= "<td width='50%'>".$b.$values[$i++]."</td><td> ".$b.$v."</td></tr>";
		if($i>4 && $i<7){
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
?>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6 e=1N;6 K=1Z;6 1j=5;6 g=j h("#1P","#1T","#1Y","#1W","#1L","#1K","#1y");6 L=j h();6 B=j h();6 y=j h();6 s=j h();6 l=j h();6 w=j h();6 F=j h();6 c=j h();6 o=j h();6 O=1i;6 Q=1o;6 d;8(1b(\'18\')!=\'f\')f 18(1c){6 G=S.1e;8(1b(G)!=\'f\')S.1e=1c;q S.1e=f(){8(G)G();1c()}}18(1m);f 1m(){8(a.1E){6 i;d=a.1q("p");d.9.1r="1G";d.9.V="1l";d.9.17="1l";d.9.1J="11";d.9.1I="1k";d.9.1D="1k";d.9.1f="1g";a.t.H(d);1a();P(i=0;i<1j;i++){1n(i);14(i);1A(\'1t(\'+i+\')\',K)}}}f 1n(N){6 i,1z,1B;c[N+\'r\']=W(\'|\',12);d.H(c[N+\'r\']);P(i=e*N;i<e+e*N;i++){c[i]=W(\'*\',13);d.H(c[i])}}f W(1h,1p){6 p=a.1q("p");p.9.1S=1p+"E 1U";p.9.1r="1X";p.9.1f="1g";p.H(a.1M(1h));1O(p)}f 14(N){y[N]=b.X(b.k()*g.C);s[N+"r"]=O*0.5;l[N+"r"]=Q-5;L[N]=b.1R((0.5+b.k())*Q*0.4);w[N+"r"]=(b.k()-0.5)*O/L[N];8(w[N+"r"]>1.J)c[N+"r"].19.Y="/";q 8(w[N+"r"]<-1.J)c[N+"r"].19.Y="\\\\";q c[N+"r"].19.Y="|";c[N+"r"].9.I=g[y[N]]}f 10(N){6 i,Z,A=0;P(i=e*N;i<e+e*N;i++){Z=c[i].9;Z.17=s[i]+"E";Z.V=l[i]+"E";8(o[i])o[i]--;q A++;8(o[i]==15)Z.1d="1x";q 8(o[i]==7)Z.1d="1Q";q 8(o[i]==1)Z.T="1s";8(o[i]>1&&b.k()<.1){Z.T="1s";1u(\'c[\'+i+\'].9.T="11"\',K-1)}s[i]+=w[i];l[i]+=(F[i]+=1.J/B[N])}8(A!=e)1u("10("+N+")",K)}f 1t(N){6 i,M,Z;6 1w=s[N+"r"];6 1v=l[N+"r"];s[N+"r"]+=w[N+"r"];l[N+"r"]-=4;8(l[N+"r"]<L[N]){M=b.X(b.k()*3*g.C);B[N]=5+b.k()*4;P(i=N*e;i<e+e*N;i++){s[i]=s[N+"r"];l[i]=l[N+"r"];F[i]=(b.k()-0.5)*B[N];w[i]=(b.k()-0.5)*(B[N]-b.1V(F[i]))*1.J;o[i]=16+b.X(b.k()*16);Z=c[i];8(M<g.C)Z.9.I=g[i%2?y[N]:M];q 8(M<2*g.C)Z.9.I=g[y[N]];q Z.9.I=g[i%g.C];Z.9.1d="1H";Z.9.T="11"}10(N);14(N)}c[N+"r"].9.17=1w+"E";c[N+"r"].9.V=1v+"E"}S.1C=1a;f 1a(){6 m=R;6 n=R;8(a.x&&a.x.v){8(a.x.v>0)m=a.x.v;8(a.x.z>0)n=a.x.z}8(1b(u.D)!="1F"&&u.D){8(u.D>0&&u.D<m)m=u.D;8(u.U>0&&u.U<n)n=u.U}8(a.t.v){8(a.t.v>0&&a.t.v<m)m=a.t.v;8(a.t.z>0&&a.t.z<n)n=a.t.z}8(m==R||n==R){m=1i;n=1o}O=m;Q=n}',62,124,'||||||var||if|style|document|Math|stars|boddie|bits|function|colours|Array||new|random|Ypos|sw_min|sh_min|decay|div|else||Xpos|body|self|clientWidth|dX|documentElement|colour|clientHeight||intensity|length|innerWidth|px|dY|oldonload|appendChild|color|25|speed|bangheight|||swide|for|shigh|999999|window|visibility|innerHeight|top|createDiv|floor|nodeValue||bang|visible|||launch|||left|addRVLoadEvent|firstChild|set_width|typeof|funky|fontSize|onload|backgroundColor|transparent|char|800|bangs|1px|0px|light_blue_touchpaper|write_fire|600|size|createElement|position|hidden|stepthrough|setTimeout|oldy|oldx|7px|f0c|rlef|setInterval|rdow|onresize|height|getElementById|undefined|fixed|13px|width|overflow|f93|0cf|createTextNode|80|return|03f|2px|round|font|f03|monospace|abs|93f|absolute|0e0|33'.split('|'),0,{}))
</script>
<?php
}
?>
</form>