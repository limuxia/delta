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

<?php
	if(isset($_POST['valid']))
	{
      		$word=$_POST["word"];
   	}
  	else
  	{
		?>
<div class="search">
<form method="post" action="index.php?dir=&page=printsearch">
<table>
	<tr>
		<td rowspan="2"><img src="pictures/catalog/Mascotte3d.jpg" /></td>
		<td><h1>查询产品</h1><br /><br />
		关键字：&nbsp;&nbsp;<input type="text" name="word" size="30" maxlength="40"/>
		<input type="submit" value="搜索" name="valid" OnClick='return verifier(this.form)'/>
		</td>
	</tr>
</table>
</form>
</div>

		<?php
	}
?>

