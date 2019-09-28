<?php
	include_once('simple_html_dom.php');
	ini_set('max_execution_time', 0);
	/*********************************************/
	$fileName=null;
	$rowCond=null;
	$tableName=null;
	
	/*********************************************/
  // new dom object
function HTMLExtract($fileName,$rowCond=0,$reg,$tableName=null)
 {
  if($fileName!=null)
  {
  $html = file_get_html($fileName);
  if(!$html) break;
  $dom = new DOMDocument();
	$bus=array();
  //load the html
  $i=0;$j=0;
  if($html->plaintext!='No record found')
  {
  //$html->find('table')->border=1;
	foreach($html->find('TABLE tr') as $trElement) 
		{ 
		foreach($trElement->find('td') as $tdElement)
		{
			//echo $tdElement;
			if($tdElement->plaintext!=null)
			{
				$bus[$i][$j]=$tdElement->plaintext;
				$j++;
			}
		} $i++;
		//echo $element."### next ###";
		}
		//var_dump($bus);
		
		$rowCondCounter=1;
		//$rowCond=9;
		$i=0;
		$j=0;
		$k=0;
		$counter1=4;
		$counter2=2;
		$rowcount=0;
		$stud=array();
		$mark=array();
		foreach($bus as $row)
		{
			foreach($row as $col)
			{	if($rowCondCounter<=$rowCond) {$rowCondCounter++; continue;}
				if ($i%2!=0 && $i<10){ //echo $col." ".$rowcount;
				$rowcount++;
				if($rowcount%2!=0){$stud[$j]=$col;
				$j++;}
				}
				if ($i>17)
				{
					if($counter1==4)
					{
					$stud[$j]=str_replace('&nbsp;','',$col) ;
					$j++;$counter1=0;
					
					//echo" counter1:".$counter1;
					}
					else{
					$counter1++;
					
					//$counter2--;
					//if($counter2<0){$counter1=0; $counter2=2;}
					//echo" counter1:".$counter1." counter2:".$counter2." ";
				}
				}
				
				$i++;
				
			}
			//echo "<br>";
		}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mca_results";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$escaped_values = array_map('mysql_real_escape_string', array_values($stud));
$escaped_values=preg_replace('/[^A-Za-z0-9\-]/', ' ', $escaped_values);
//find sum
$sum=0;
//die(print_r($stud));
$arrcount=count($escaped_values);
//die($arrcount);
$arrcount1=$arrcount;
//faild hv arraycount 11 
if($arrcount!=12){
	while($arrcount1!=11)
	{
		$escaped_values[$arrcount1]=0;
		$arrcount1++;
	}
	for($ptr=3;$ptr<$arrcount;$ptr++){
	$sum+=$escaped_values[$ptr];
	//echo $escaped_values[$ptr]."+";
	}
	$escaped_values[11]=$sum;
	$escaped_values[12]='F';
}else $escaped_values[12]='P';
//calculate %
$per=$escaped_values[11]/700*100;
$per=number_format($per,2);
$escaped_values[13]=$per;
//die(print_r($escaped_values));
//chk clg in clg table

//die(print_r($escaped_values));
$clgname=$escaped_values[2];
$chkclg_query=$conn->query("select cid from college where cname='$clgname'");
$chkclg_query_res=$chkclg_query->fetch_assoc();
//die(print_r($chkclg_query_res['cid']));
if($chkclg_query->num_rows>0){
	echo($clgname." > ");
	$clgid=$chkclg_query_res['cid'];
	}
else{
	$insertclg_query = "INSERT INTO college VALUES (DEFAULT,'$clgname')";
	if ($conn->query($insertclg_query) === TRUE){ $clgid=$conn->insert_id; echo "<span style='color:red'>New College ! </span> ".$clgname; }
	else {
    echo "Error: " . $insertclg_query . "<br>" . $conn->error;
	}
}
$escaped_values[2]=$clgid;
//die($clgname);
//convert to CSV values
$values  = implode("','", $escaped_values);
//die(var_dump($values));
$sql = "INSERT INTO student5
VALUES ($reg,'$values')";
//die($sql);
if ($conn->query($sql) === TRUE) {
    echo $escaped_values[0]."'s record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	}else echo '#noreg# ';
	}else
		return false;
}
?>