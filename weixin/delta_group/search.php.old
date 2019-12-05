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
<form method="post" action="content2.php?content=printsearch">	<!--用content2.php用于不显示页脚框架-->
<table>
	<tr>
		<td><h1>查询产品</h1><br /><br />
		关键字：&nbsp;&nbsp;<input type="text" name="word" maxlength="40"/>
		<input type="submit" value="搜索" name="valid" OnClick='return verifier(this.form)'/>
		</td>
	</tr>
</table>
</form>

		<?php
	}
?>

