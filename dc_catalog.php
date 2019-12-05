<SCRIPT LANGUAGE='JavaScript'>
function verifier(f)
{
	if(f.word.value=="")
	{
		alert("请输入查询关键字 !!");
		return false;
	}
	return true;
}
</SCRIPT>
<table class="catalog">
<tr>
	<td width="7%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=head"><img class="RoundCorner" src="pictures/catalog/head.jpg" alt="头部" onmouseover="this.src='pictures/catalog/head_hover.jpg';" onmouseout="this.src='pictures/catalog/head.jpg';"  /></a>
		<br  />
		<a href="index.php?dir=catalog&page=head">头部</a>
	</td>
	<td width="68%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=respiratory"><img class="RoundCorner" src="pictures/catalog/resp.jpg" alt="呼吸类" onmouseover="this.src='pictures/catalog/resp_hover.jpg';" onmouseout="this.src='pictures/catalog/resp.jpg';"  /></a>
		<br />
		<a href="index.php?dir=catalog&page=respiratory">呼吸类</a>
	</td>
	<td width="5%">
	</td>
</tr>
<tr>
	<td width="7%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=gloves"><img class="RoundCorner" src="pictures/catalog/gloves.jpg" alt="手部" onmouseover="this.src='pictures/catalog/gloves_hover.jpg';" onmouseout="this.src='pictures/catalog/gloves.jpg';"  /></a>
		<br  />
		<a href="index.php?dir=catalog&page=gloves">手部</a>
	</td>
	<td width="68%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=shoes"><img class="RoundCorner" src="pictures/catalog/shoes.jpg" alt="安全鞋" onmouseover="this.src='pictures/catalog/shoes_hover.jpg';" onmouseout="this.src='pictures/catalog/shoes.jpg';"  /></a>
		<br />
		<a href="index.php?dir=catalog&page=shoes">安全鞋</a>
	</td>
	<td width="5%">
	</td>
</tr>
<tr>
	<td width="7%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=wk_clothes"><img class="RoundCorner" src="pictures/catalog/clothes.jpg" alt="工作服" onmouseover="this.src='pictures/catalog/clothes_hover.jpg';" onmouseout="this.src='pictures/catalog/clothes.jpg';"  /></a>
		<br />
		<a href="index.php?dir=catalog&page=wk_clothes">工作服</a>
	</td>
	<td width="68%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=tec_clothes"><img class="RoundCorner" src="pictures/catalog/tech_clothes.jpg" alt="高科技防护服" onmouseover="this.src='pictures/catalog/tech_clothes_hover.jpg';" onmouseout="this.src='pictures/catalog/tech_clothes.jpg';"  /></a>
		<br />
		<a href="index.php?dir=catalog&page=tec_clothes">高科技防护服</a>
	</td>
	<td width="5%">
	</td>
</tr>
<tr>
	<td width="7%">
	</td>
	<td width="10%">
		<a href="index.php?dir=catalog&page=fall_arrest"><img class="RoundCorner" src="pictures/catalog/fall_arrest.jpg" alt=" 防坠落" onmouseover="this.src='pictures/catalog/fall_arrest_hover.jpg';" onmouseout="this.src='pictures/catalog/fall_arrest.jpg';"  /></a>
		<br />
		<a href="index.php?dir=catalog&page=fall_arrest">防坠落</a>
	</td>
	<td width="68%">
	</td>
	<td width="10%"><h1>查询产品</h1>
		<form method="post" action="index.php?dir=&page=printsearch">
			<input type="text" name="word" size="12" maxlength="40"/>
			<input type="submit" value="搜索" name="valid" OnClick='return verifier(this.form)'/>
		</form>
	</td>
	<td width="5%">
	</td>
</tr>
</table>