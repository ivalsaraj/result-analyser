<?php

		echo form_open(base_url().'result/'.$this->router->fetch_class().'/myrank'); 
?>
<div id="rearea">
<input type="text" name="regno" value="<?php if(isset($_POST['regno'])) echo $_POST['regno']; ?>"/>
<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
<a class="btn btn-info" href="<?php echo base_url('result/compare').'/'; if (isset($_POST['regno'])) echo $_POST['regno']; ?>">Add to Compare</a>
</div>
</form>
<style>
	#sname {
    font-family: arial;
    font-size: 30px;
	}
	#per {
    font-size: 17px;
    text-transform: capitalize;
	}
	#rank {
    color: #fff;
    font-size: 52px;
    font-weight: bold;
    left: 69px;
    position: absolute;
    top: 63px;
	}
	@media only screen and (max-width : 768px) {
	#rank {
    left: 0;
	}
	.col-xs-12 {
		padding:0;
	}
	#right
	{
		top:10px !important;
	}
	.nav > li {
    border-bottom: 1px solid #ccc;
    display: block;
    position: relative;
    text-align: center;
}
	}
	@media only screen and (max-width : 430px) {
	.rank-wrap img {
    width: 200;
	}
	#rank
	{
		top: 50px;
		font-size: 44px;
	}
    }
</style>
<?php
if(!empty($msg)){
	echo '<div class="callout callout-danger">
              <h4>Warning!</h4>
              <p>'.$msg.'</p>
            </div>';
}
if(!empty($result))
{
//die(var_dump($result));

	echo '<div class="box box-info" style="margin-top:20px">
                <div class="box-header">
                  <h3 class="box-title">Your Global Rank</h3>
                <div class="box-body">
                  <div class="row">
				  <div class="rankcol col-xs-12 col-md-10 col-sm-10 col-lg-8 col-md-offset-1 col-xs-offset-0 col-sm-offset-1 col-lg-offset-2">
                    <div class="col-xs-12">
                     <div id="img1" class="col-xs-12 col-sm-4"><div class="rank-wrap" style="position:relative"><img src="'.base_url("assets/img/rank.png").'"><span id="rank" class="col-xs-12 col-sm-4">'.$result->rank.'</span></div></div><div style="line-height: 1.5;top: 41px;" id="right" class="rafirst col-xs-12 col-sm-8"><p id="sname">'.$result->name.'</p><p id="scollege">'.$result->cname.'</p><p id="per"><b>'.$result->percent.'%</b></p><p id="total"><b>'.$result->total.'</b>/700</p></div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div></div></div>';
//die(var_dump($result));
	if($result->pass=='F')
		echo ' <blockquote class="text-left">
      <p>Sometimes by losing a battle you find a new way to win the war.</p>
      <footer><cite title="Do be upset">Donald Trump</cite></footer>
    </blockquote>';
	echo "Congratulations ! Improve your rank next time !";
	echo "<br>Rank based on your total mark and out of total students !<br>
Students with same marks are treated with alphabetical order of their names !";
}
?>