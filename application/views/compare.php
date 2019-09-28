<?php

	echo form_open(base_url().'result/'.$this->router->fetch_class().'/compare');
?>
<blockquote class="text-left">
      <p>Don't Compare yourself with anyone in this world.. If do so, you are insulting yourself.</p>
      <footer><cite title="Do be upset">Bill Gates</cite></footer>
    </blockquote>
<table width="100%">
<tr><td style="text-align: center;"><input style="width:95%" placeholder="your register number" class="form-control" type="text" name="reg1" value="<?php
 if(isset($reg1)) echo $reg1; if(isset($_POST['reg1'])) echo $_POST['reg1'];?>"/></td>
<td style="text-align: center;"><input class="form-control" style="width:95%" value="<?php if(isset($_POST['reg2'])) echo $_POST['reg2']; ?>" placeholder="friend's register number" type="text" name="reg2"/></td>
<td><input type="submit" class="btn btn-primary" value="submit" name="submit"/></td></tr></table>

<?php
	//print_r($regres1).' '.print_r($regres2).' '.$msg;
	echo $resview;
?>
