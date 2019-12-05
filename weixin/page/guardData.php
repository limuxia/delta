<div id="content">

<?php

include("connectDB.php");
$sql = "select guardCategory,description from guard where code='{$_REQUEST['guard']}'";
$result = mysql_query($sql);
if($row=mysql_fetch_array($result))
{
	echo "<div>
			<p class='title pMargin0'>$row[0]</p>
			<p class='itemEffect fontStyle2 pMargin0'>$row[1]</p>
		</div>";
}

$sql = "select standard from guard_standard where code_guard='{$_REQUEST['guard']}' and flag='G'";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>国标</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	//注意url参数不支持+号&号，所以务必留心保证数据不要带这些符号以免出错，注：也不能使用urlencode()对参数编码因为会使非符号字符如中文出错
	//另须注意：$_GET、$_REQUEST更不需要urldecode()解码，因为php这两个函数本身已解码
	echo "<li><a class='aStyle2' href='index.php?page=standard&standard=$row[0]'><p class='itemEffect pMargin0'>$row[0]</p></a></li><hr />";
}
echo "</ul></div>";

$sql = "select standard from guard_standard where code_guard='{$_REQUEST['guard']}' and flag='E'";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>欧标</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	//注意url参数不支持+号&号，所以务必留心保证数据不要带这些符号以免出错，注：也不能使用urlencode()对参数编码因为会使非符号字符如中文出错
	//另须注意：$_GET、$_REQUEST更不需要urldecode()解码，因为php这两个函数本身已解码
	echo "<li><a class='aStyle2' href='index.php?page=standard&standard=$row[0]'><p class='itemEffect pMargin0'>$row[0]</p></a></li><hr />";
}
echo "</ul></div>";

$sql = "select product from guard_product where code_guard='{$_REQUEST['guard']}'";
$result = mysql_query($sql);
echo "<div>
			<p class='title pMargin0'>产品推荐</p>
			<ul class='ulStyle1'>";
while($row=mysql_fetch_array($result))
{
	echo "<li><a class='aStyle2' href='http://cn.deltaplus.com.cn/productSearch.php?word=$row[0]'><p class='itemEffect pMargin0'>$row[0]</p></a></li><hr />";
}
echo "</ul></div>";

mysql_close();

?>

</div>