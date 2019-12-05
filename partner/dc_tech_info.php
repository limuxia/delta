<div class="docs">


<?php

//include('./stat/stat.php'); // verify user, and if user is OK, we access to this page
include('./config/dbconnect.php'); // connect to database

$sql = "SELECT id,name,chinese,english,ce,test FROM doc_tech order by id";
$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());

function switchcolor()
 { 
   static $col;
   $couleur1 = "#CECECE";
   $couleur2 = "#EFEFEF";

    if ($col == $couleur1)
     {
       $col = $couleur2;
     }
    else
     {
       $col = $couleur1;
     }
    return $col; 
}

echo '<table style="width:820px;" cellpadding="5" cellspacing="0"  class="tableThinBorder tableRoundCornerLeft tableRoundCornerRight"><tr bgcolor="#FFFF66"><td>产品编号</td><td>规格型号</td><td>中文技术资料</td><td>英文技术资料</td><td>CE认证</td><td>中文检测报告</td></tr>';
while ($data = mysql_fetch_array($req)){
echo '<tr bgcolor=';
echo switchcolor();
echo '><td>';
echo $data['id'];
echo '</td><td>';
echo $data['name'];
echo '</td><td>';
if ($data['chinese']=='' || $data['chinese']=='partner/docs/ch_tech/' || $data['chinese']=='partner/docs/ch_tech')
	echo '加入中...';
else
{
	echo '<a href="';
	echo $data['chinese'];
	echo '.pdf">下载</a>';
}
echo '</td><td>';
if ($data['english']=='' || $data['english']=='partner/docs/en_tech/' || $data['english']=='partner/docs/en_tech')
	echo '加入中...';
else
{
	echo '<a href="';
	echo $data['english'];
	echo '.pdf">下载</a>';
}
echo '</td><td>';
if ($data['ce']=='' || $data['ce']=='partner/docs/ce/' || $data['ce']=='partner/docs/ce')
	echo '加入中...';
else
{
	echo '<a href="';
	echo $data['ce'];
	echo '.pdf">下载</a>';
}
echo '</td><td>';
if ($data['test']=='' || $data['test']=='partner/docs/ch_test/' || $data['test']=='partner/docs/ch_test')
	echo '加入中...';
else
{
	echo '<a href="';
	echo $data['test'];
	echo '.pdf">下载</a>';
}
echo '</td>';
}
echo '</table>';
mysql_close();
?>
</div>