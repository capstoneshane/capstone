<?PHP
require_once("fg_membersite.php");

$fgmembersite = new FGMembersite_2();

//Provide your site name here
$fgmembersite->SetWebsiteName('db.soic.indiana.edu');



$fgmembersite->InitDB(/*hostname*/'db.soic.indiana.edu',
                      /*username*/'i491u16_jpshane',
                      /*password*/'my+sql=i491u16_jpshane',
                      /*database name*/'i491u16_jpshane',
                      /*table name*/'member');

$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>