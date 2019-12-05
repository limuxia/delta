<?php 
include("config/dbconnect.php"); // connect to database
$j = 1;

echo '<table style="width:750px;" cellspacing="15"><tr>';

$req = mysql_query('SELECT id_newprod,name,picture,pdf FROM newproducts order by id_newprod desc');
while ($data = mysql_fetch_array($req)){ 

if(abs(filesize($data["pdf"]."pdf")) >10468760){
	echo '<td width="250px"><a href="javascript:void(0)" onclick=" function whetherDownload()
    {
        var result=confirm("欢迎查看代尔塔产品目录！文件较大，建议链接WIFI后查看");
        if(result)
        {
            location.href=' ;
			echo $data['pdf'].'.pdf" ';
        echo '    
        }
        else
        {
            document.writeln("没有选择任何下载内容！");
            document.title="产品介绍"; 
        }
    }" ';
	
	echo '<img src="';
	echo $data['picture'];
	echo '.jpg"></a><br /><br /><a href="';
	echo $data['pdf'];
	echo '.pdf">';
	echo $data['name'];
	echo '</a><br /><br /></td>';
	if ($j%3 == 0) 
	{ 
		echo '</tr><tr>'; 
	} 
	$j++; 
	}
else{
	echo '<td width="250px"><a href="';
	echo $data['pdf'];
	echo '.pdf" /><img src="';
	echo $data['picture'];
	echo '.jpg"></a><br /><br /><a href="';
	echo $data['pdf'];
	echo '.pdf">';
	echo $data['name'];
	echo '</a><br /><br /></td>';
	if ($j%3 == 0) 
	{ 
		echo '</tr><tr>'; 
	} 
	$j++; 
	} 

}



echo '</tr></table>';
mysql_close();
?>