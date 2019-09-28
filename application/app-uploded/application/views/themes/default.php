<html lang="en">
	<head>
		<title><?php if(!empty($meta['description'])) echo $meta['description'].' | MGU MCA Result Analyser'; else echo "MCA Result Analyser"; ?></title>
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
		<link href="<?php echo base_url('assets/bootstrap.min.css'); ?>" rel="stylesheet"/>
	    <link href="<?php echo base_url('assets/theme.min.css'); ?>" rel="stylesheet"/>
	<?php
	/** -- Copy from here -- */
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t";

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	} echo "\n\t";

	/** -- to here -- */
?>

    <!-- Le styles -->

		<style type="text/css">
		.skin-black .main-header{-webkit-box-shadow:0 1px 1px rgba(0,0,0,0.05);box-shadow:0 1px 1px rgba(0,0,0,0.05)}.skin-black .main-header .navbar-toggle{color:#333}.skin-black .main-header .navbar-brand{color:#333;border-right:1px solid #eee}.skin-black .main-header>.navbar{background-color:#fff}.skin-black .main-header>.navbar .nav>li>a{color:#333}.skin-black .main-header>.navbar .nav>li>a:hover,.skin-black .main-header>.navbar .nav>li>a:active,.skin-black .main-header>.navbar .nav>li>a:focus,.skin-black .main-header>.navbar .nav .open>a,.skin-black .main-header>.navbar .nav .open>a:hover,.skin-black .main-header>.navbar .nav .open>a:focus{background:#fff;color:#999}.skin-black .main-header>.navbar .navbar-custom-menu>.nav{margin-right:10px}.skin-black .main-header>.navbar .sidebar-toggle{color:#333}.skin-black .main-header>.navbar .sidebar-toggle:hover{color:#999;background:#fff}.skin-black .main-header>.navbar>.sidebar-toggle{color:#333;border-right:1px solid #eee}.skin-black .main-header>.navbar .navbar-nav>li>a{border-right:1px solid #eee}.skin-black .main-header>.navbar .navbar-custom-menu .navbar-nav>li>a,.skin-black .main-header>.navbar .navbar-right>li>a{border-left:1px solid #eee;border-right-width:0}.skin-black .main-header>.logo{background-color:#fff;color:#333;border-bottom:0 solid transparent;border-right:1px solid #eee}.skin-black .main-header>.logo>a{color:#333}.skin-black .main-header>.logo:hover{background:#fcfcfc}@media (max-width:767px){.skin-black .main-header>.logo{background-color:#222;color:#fff;border-bottom:0 solid transparent;border-right:none}.skin-black .main-header>.logo>a{color:#fff}.skin-black .main-header>.logo:hover{background:#1f1f1f}}.skin-black .main-header li.user-header{background-color:#222}.skin-black .content-header{background:transparent;box-shadow:none}.skin-black .user-panel>.image>img{border:1px solid #444}.skin-black .user-panel>.info,.skin-black .user-panel>.info>a{color:#eee}.skin-black .main-sidebar,.skin-black .left-side,.skin-black .wrapper{background:#222}.skin-black .sidebar>.sidebar-menu>li.header{background:#1d1d1d;color:rgba(255,255,255,0.4)}.skin-black .sidebar>.sidebar-menu>li>a{margin-right:1px;border-left:3px solid transparent}.skin-black .sidebar>.sidebar-menu>li>a:hover,.skin-black .sidebar>.sidebar-menu>li.active>a{color:#fff;background:#444;border-left-color:#fff}.skin-black .sidebar>.sidebar-menu>li>.treeview-menu{background:#333}.skin-black .sidebar a{color:#eee}.skin-black .sidebar a:hover{text-decoration:none}.skin-black .treeview-menu>li>a{color:#ccc}.skin-black .treeview-menu>li.active>a,.skin-black .treeview-menu>li>a:hover{color:#fff}.skin-black .sidebar-form{border-radius:3px;border:1px solid #3c3c3c;margin:10px 10px}.skin-black .sidebar-form input[type="text"],.skin-black .sidebar-form .btn{box-shadow:none;background-color:#3c3c3c;border:1px solid transparent;height:35px;-webkit-transition:all .3s cubic-bezier(.32, 1.25, .375, 1.15);-o-transition:all .3s cubic-bezier(.32, 1.25, .375, 1.15);transition:all .3s cubic-bezier(.32, 1.25, .375, 1.15)}.skin-black .sidebar-form input[type="text"]{color:#666;border-top-left-radius:2px !important;border-top-right-radius:0 !important;border-bottom-right-radius:0 !important;border-bottom-left-radius:2px !important}.skin-black .sidebar-form input[type="text"]:focus,.skin-black .sidebar-form input[type="text"]:focus+.input-group-btn .btn{background-color:#fff;color:#666}.skin-black .sidebar-form input[type="text"]:focus+.input-group-btn .btn{border-left-color:#fff}.skin-black .sidebar-form .btn{color:#999;border-top-left-radius:0 !important;border-top-right-radius:2px !important;border-bottom-right-radius:2px !important;border-bottom-left-radius:0 !important}
		</style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
	<meta property="og:image" content="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png"/>
	
</head>

  <body class="layout-top-nav skin-black">
<header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><b>MCA</b>ResultAnalyzer</a>
            <button style="padding: 10px;" data-target="#navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" id="navbar-toggle" type="button">
              <i class="fa fa-bars" style="font-size: 21px;font-weight: bold;"><img src="<?php echo base_url('assets/img/menu.png'); ?>"/></i>
            </button>
          </div>
	<script>
	
	</script>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav"><?php $ur=$this->router->fetch_class(); ?>
              <li class="active"><a href="<?php echo base_url(); ?>">Result <span class="sr-only">(current)</span></a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/compare'; ?>">Compare</a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/myrank'; ?>">MyRank</a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/mycollege'; ?>">MyCollege</a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/top10'; ?>">Top10</a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/top20'; ?>">Top20</a></li>
              <li><a href="<?php echo base_url().'result/'.$ur.'/top50'; ?>">Top50</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
			<form role="search" class="navbar-form navbar-left hidden-xs">
              <div class="form-group">
                <input type="text" placeholder="Search" id="navbar-search-input" class="form-control">
              </div>
            </form>
              <li><a href="<?php echo base_url('about') ?>">About</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
    <div class="content-wrapper">
	<div class="container-fluid">
	<section class="content-header">
            <h1>
              <?php if(!empty($meta['description'])) echo $meta['description'].' - '.str_replace('sem','Semester',$this->router->fetch_class()); else echo "MCA Result Analyser"; ?>
              <small>v 1.0</small>
            </h1>
          </section>
	<div class="content">
	<div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">MCA Results</h3>
              </div>
              <div class="box-body"style="text-align: center;">
               
    <?php if($this->load->get_section('text_header') != '') { ?>
    	<h1><?php echo $this->load->get_section('text_header');?></h1>
    <?php }?>
	    <?php echo $output;?>

              </div><!-- /.box-body -->
            </div>
	</div>
	<script>
document.getElementById('navbar-toggle').onclick = function() {
	var btn=document.getElementById('navbar-collapse');
    var className = ' ' + btn.className + ' ';

    btn.className = ~className.indexOf(' in ') ?
                         className.replace(' in ', ' ') :
                         btn.className + ' in';
}
	</script>
	</div></div>
	<footer class="main-footer">
        <div class="container-fluid">
          <div class="pull-right hidden-xs">
            <b>Result Analyser</b> 1.0<span>
			<?php
session_start();
$counter_name = "counter.txt";

// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}

echo "$counterVal"; ?>
			</span>
          </div>
          <strong>Developed & Designed by <a href="<?php echo base_url('about') ?>">MCAA STAS Edappally</a> | <a href="<?php echo base_url('about/disclaimer') ?>">Disclaimer</a>.</strong>.
        </div><!-- /.container -->
      </footer>
	  <!-- /container -->
</body></html>
