<?php 
include_once('HTML2db_6.php');

/*HTMLExtract(http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=501429&ex=First%20Semester%20M%20C%20A%20Degree%20Examination%20July%202014&sid=0.47346143222565673',0);*/
//$a=base_url('index.php/result/gett');
//HTMLExtract($a,0,123);
for($i=$first;$i<=$last;$i++)
{
/*$url="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=First%20Semester%20M%20C%20A%20Degree%20Examination%20July%202014&sid=0.47346143222565673";
/*$url1="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=Fourth%20Semester%20MCA%20Degree%20Examination%20October%202015";*/
$url1="http://projects.mgu.ac.in/ugadmission/webresult/ajax_response.php?case=webresult&val=".$i."&ex=Sixth%20Semester%20M%20C%20A%20Degree%20Examination%20November%202016&sid=0.4088642177560404";
HTMLExtract($url1,0,$i);
}