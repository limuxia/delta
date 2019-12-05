<script src="js/validate_mail.js"></script>
<script>
function gernarateNode(rootNode,type)
{
	rootNode.innerHTML="";
	switch(type)
	{
	case 0:
	 var span1 = document.createElement("span");
	 span1.innerHTML="销售渠道";
	 span1.style.cssText = "display:block;float:left;";
	 rootNode.appendChild(span1);

	 var input_salesChannel=document.createElement("input")
	 input_salesChannel.type="text";
	 input_salesChannel.name="salesChannel";
	 input_salesChannel.id="salesChannel";
	 input_salesChannel.value="请选择或输入";
	 input_salesChannel.style.cssText="float:left;margin-left:6px;";
	 rootNode.appendChild(input_salesChannel);

	 var select1=document.createElement("select");
	 select1.onchange=function(){document.getElementById('salesChannel').value=this.options[this.selectedIndex].text;};
	 select1.style.cssText="float:left;width:15px;";
	 rootNode.appendChild(select1);	
	 var option1=document.createElement("option");
	 select1.appendChild(option1);
	 var option2=document.createElement("option");
	 option2.innerHTML="门店销售及批发";
	 select1.appendChild(option2);
	 var option3=document.createElement("option");
	 option3.innerHTML="线上销售";
	 select1.appendChild(option3);
	 var option4=document.createElement("option");
	 option4.innerHTML="项目投标(消防)";
	 select1.appendChild(option4);
	 var option5=document.createElement("option");
	 option5.innerHTML="其它";
	 select1.appendChild(option5);
	 break;
	case 1:
		 var span1 = document.createElement("span");
		 span1.innerHTML="职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务";
		 span1.style.cssText = "display:block;float:left;";
		 rootNode.appendChild(span1);

		 var select1=document.createElement("select");
		 select1.name="post";
		 select1.style.cssText="float:left;margin-left:6px;";
		 rootNode.appendChild(select1);	
		 var option1=document.createElement("option");
		 option1.innerHTML="请选择或输入";
		 select1.appendChild(option1);
		 var option2=document.createElement("option");
		 option2.innerHTML="安全官";
		 select1.appendChild(option2);
		 var option3=document.createElement("option");
		 option3.innerHTML="采购者";
		 select1.appendChild(option3);
		 var option4=document.createElement("option");
		 option4.innerHTML="使用者";
		 select1.appendChild(option4);
		 break; 
	}
}
</script>
<div class="edge3">
<form method="post" action="submit.php?submit=vip" onsubmit="return validate_form(this);">
<p>公司名称 <input type="text" name="company" /></p>
<p>
	<span style="display:block;float:left;">公司类型</span>
	<select style="float:left;margin-left:6px;" name="companyType" onchange="gernarateNode(document.getElementById('gernarateNode'),this.selectedIndex);">
				<option selected="selected">经销商</option>
				<option>终端用户</option>
	</select>
</p>
<div style="clear:both;"></div>
<p>所在城市 <input type="text" name="address" /></p>
<p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 <input type="text" name="name" /></p>
<p>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机 <input type="text" name="phone" /></p>
<p>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱 <input type="text" name="mail" /></p>
<p id="gernarateNode">
	<span style="display:block;float:left;">销售渠道</span>
	<input style="float:left;margin-left:6px;" type="text" name="salesChannel" id="salesChannel" value="请选择或输入" />
	<select style="float:left;width:15px;" onchange="document.getElementById('salesChannel').value=this.options[this.selectedIndex].text">
		<option></option>
		<option>门店销售及批发</option>
		<option>线上销售</option>
		<option>项目投标(消防)</option>
		<option>其它</option>
	</select>
</p>
<div style="clear:both;"></div>
<input style="float:right;" type="submit" value="提交" />
<div style="clear:both;"></div>
</form>
<p style="font-size:0.8em;color:gray;">【注】:因要发送VIP账号及密码，请保证手机、邮箱等信息准确。我们不会提供给第三方做任何商业用途！</p>
</div>