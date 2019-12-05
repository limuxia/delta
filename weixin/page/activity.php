<script src="js/validate_mail.js"></script>
<div class="edge3">
<form method="post" enctype="multipart/form-data" action="submit.php?submit=activity" onsubmit="return validate_form(this);">
<p>微&nbsp;&nbsp;信&nbsp;&nbsp;名 <input type="text" name="WXName" /></p>
<p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 <input type="text" name="name" /></p>
<p>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机 <input type="text" name="phone" /></p>
<p>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱 <input type="text" name="mail" /></p>
<p>截图上传 <input type="file" name="photo" /></p>
<input style="float:right;" type="submit" value="提交" />
<div style="clear:both;"></div>
</form>
</div>