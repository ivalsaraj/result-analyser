<?php 
include_once('HTML2db_3.php');
//include_once('multirequest.php');

/*first sem HTMLExtract(http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=501429&ex=First%20Semester%20M%20C%20A%20Degree%20Examination%20July%202014&sid=0.47346143222565673',0);*/
//$a=base_url('index.php/result/gett');
//HTMLExtract($a,0,123);
//$url="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=First%20Semester%20M%20C%20A%20Degree%20Examination%20July%202014&sid=0.47346143222565673";
// second sem$url[$j]="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=Second%20Semester%20M%20C%20A%20Degree%20Examination%20November%202014&sid=0.7039012529421598";

	$first=$_GET['f'];
	$last=$_GET['l'];
	//die($first);
	$j=0; $limit=5; $k=0;
for($i=$first;$i<=$last;$i++)
{
	$url="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=Third%20Semester%20M%20C%20A%20Degree%20Examination%20April%202015&sid=0.8971961545757949";
	HTMLExtract($url,0,$i);
}

//var_dump(multiRequest($url));