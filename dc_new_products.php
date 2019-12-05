<?php 
include("config/dbconnect.php"); // connect to database
$j = 1;

$req = mysql_query('SELECT id_newprod,name,picture,pdf FROM newproducts order by id_newprod desc');

echo "<table style=\"width: 750px;\" cellspacing=\"15\"><tr>";
while ($data = mysql_fetch_array($req)) {
    if(abs(filesize($data["pdf"].".pdf")) >8388608){


        echo "<td width=\"250px\"><a href=\"javascript:void(0)\" onclick=\"jump('".$data['pdf']."')\"><img src=\"".$data['picture'].".jpg\" ></a><br><br><a
                    href=\"javascript:void(0)\" onclick=\"jump('".$data['pdf']."')\">".$data['name']." </a><br><br></td>" ;
        if($j%3 ==0){
            echo "</tr><tr>";
        }
        $j ++ ;
}else{

    echo '<td width="250px"><a href="';
    echo $data['pdf'];
    echo '.pdf" target="_blank" /><img src="';
    echo $data['picture'];
    echo '.jpg"></a><br /><br /><a href="';
    echo $data['pdf'];
    echo '.pdf" target="_blank">';
    echo $data['name'];
    echo '</a><br /><br /></td>';
    if ($j%3 == 0)
    {
        echo '</tr><tr>';
    }
    $j++;
}
}
echo   "</tr></table>";
echo " <script>
        function jump(value) {
            var result=confirm(\"欢迎下载查看代尔塔产品目录！文件较大，建议链接WIFI后下载查看\");
        if(result)
        {
            window.open(value + '.pdf');
        }
        else
        {
            document.writeln(\"没有选择任何下载查看内容！\");
            document.title=\"产品介绍\";  //writeln()会导致原网页内容输出打断，所以要加此设置title语句否则不显示标题而显示网址
        }
        }
    </script>   ";
mysql_close();

?>


