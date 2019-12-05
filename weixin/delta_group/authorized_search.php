<SCRIPT LANGUAGE='JavaScript'>
function verifier(f)
{
	if(f.word.value=="")
	{
		alert("请输入授权代码 !!");
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
<form method="post" action="content.php?content=get_authorized">
<table align="center">
	<tr>
		<td><h1>请输入授权代码</h1><br /><br />
		<input type="text" name="word" maxlength="40"/>
		<input type="submit" value="搜索" name="valid" OnClick='return verifier(this.form)'/>
		</td>
	</tr>
</table>
    <p align="center">请正确填写授权代码，对于任何形式的转授权，二次授权均不认可
		<br/> 如查询无法验证，可邮件至sales@deltaplus.com.cn 进行咨询
	</p>
</form>

		<?php
	}
?>

