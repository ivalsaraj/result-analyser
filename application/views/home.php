<h1>Welcome to the Result Analyser Portal</h1>
<div class="clock" style="margin:2em;"></div>
	<div class="message"></div>
<h2><?php if(isset($_GET['m'])) echo "<span style='color:red'>Please Select Semester</span>"; else{ ?>MCA 2013-2016 <?php } ?></h2>
<br>
	<a href="result/sem1" class="btn btn-info btn-lg">First Semester</a>
	<a href="result/sem2" class="btn btn-info btn-lg">Second Semester</a>
	<a href="result/sem3" class="btn btn-info btn-lg">Third Semester</a>
	<a href="result/sem4" class="btn btn-info btn-lg">Fourth Semester</a><br>
	<a href="result/sem5" class="btn btn-info btn-lg">Fifth Semester</a>
	<a href="result/sem6" class="btn btn-info btn-lg">Sixth Semester</a>
	<a href="result/overall" class="btn btn-info btn-lg">Overall Result</a>
	<style>.btn{margin: 4px 0;}</style>