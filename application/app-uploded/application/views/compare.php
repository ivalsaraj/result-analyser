<?php

	echo form_open(base_url().'result/'.$this->router->fetch_class().'/compare');
?>
<table width="100%">
<tr><td style="text-align: center;"><input style="width:95%" placeholder="your register number" type="text" name="reg1" value="<?php
 if(isset($reg1)) echo $reg1; if(isset($_POST['reg1'])) echo $_POST['reg1'];?>"/></td>
<td style="text-align: center;"><input style="width:95%" value="<?php if(isset($_POST['reg2'])) echo $_POST['reg2']; ?>" placeholder="friend's register number" type="text" name="reg2"/></td>
<td><input type="submit" class="btn btn-primary" value="submit" name="submit"/></td></tr></table>

<?php
	//print_r($regres1).' '.print_r($regres2).' '.$msg;
	echo $resview;
?>
