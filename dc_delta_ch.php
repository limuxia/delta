<!--<script     language="JavaScript">
<!--
var     srcX     =     1024;     //原图大小,可以任意设置
var     srcY     =     768;
var     bigX     =     300;     //预览窗大小,可以任意设置
var     bigY     =     225;
var     smallX     =     300;     //缩略图宽度
var     smallY     =     srcY     *     smallX     /     srcX;
var     viewX     =     bigX     /     srcX     *     smallX;     //预览范围
var     viewY     =     bigY     /     srcY     *     smallY;
var     bl     =     srcX     /     smallX;//缩小比例
var     border     =     1;     //边框
window.onload=function     (){
head.innerHTML="JS+CSS实现图片放大预览效果,鼠标可以滑动图片任意地方";
smallpic.width=smallX;
smallpic.height=smallY;
bigpic.width=srcX;
bigpic.height=srcY;
view.style.width=viewX;
view.style.height=viewY;
smallbox.style.borderWidth=border;
bigbox.style.borderWidth=border;
if     (window.event){
smallbox.style.width=smallpic.offsetWidth+border*2;
smallbox.style.height=smallpic.offsetHeight+border*2;
bigbox.style.width=bigX+border*2;
bigbox.style.height=bigY+border*2;
}else{
smallbox.style.width=smallpic.offsetWidth;
smallbox.style.height=smallpic.offsetHeight;
bigbox.style.width=bigX;
bigbox.style.height=bigY;
}
move(event);
}
function     move(e){
var     e     =     window.event?window.event:e;
var     iebug     =     0;
if     (window.event){
var     vX     =     e.offsetX     -     viewX/2;
var     vY     =     e.offsetY     -     viewY/2;
}else{
var     vX     =     e.pageX     -     viewX/2     -     smallbox.offsetLeft     -     border;
var     vY     =     e.pageY     -     viewY/2     -     smallbox.offsetTop     -     border;
iebug     =     2;
}
if     (vX     <     0)     vX     =     0;
if     (vY     <     0)     vY     =     0;
if     (vX     >     smallX     -     viewX     -     iebug)     vX     =     smallX     -     viewX     -     iebug;
if     (vY     >     smallY     -     viewY     -     iebug)     vY     =     smallY     -     viewY     -     iebug;
bigpico.style.marginLeft     =     -     vX     *     bl
bigpico.style.marginTop     =     -     vY     *     bl
view.style.left     =     vX     +     smallbox.offsetLeft     +     border;
view.style.top     =     vY     +     smallbox.offsetTop     +     border;
}

</script>-->
<!--<style     type="text/css">

*{padding:0;margin:0}
img{display:block;}
#smallbox{border:1px     #c33     solid;float:left;width:0;height:0;overflow:hidden}
#bigbox{border:1px     #c33     solid;width:0px;height:0px;float:left;overflow:hidden}
#view{border:1px     #ddd     solid;width:0px;height:0px;position:absolute}
#head{text-align:center;line-height:40px;font:bold     16px/40px;color:red}

</style>-->
<!--<div     id="bigbox"          style="display:none"><div     id="bigpico"><img     src="pictures/delta/chinebig.jpg"     name="bigpic"     width="300"     height="300"     border="0"     id="bigpic"></div>
</div>
<div     id="view"     onmousemove="move(event)     "style="display:none"></div>-->

<table cellpadding="5" cellspacing="0">
<!--<tr>


<td colspan="2" align="center"><h3>代尔塔中国</h3></td>
</tr>-->
<tr>
  <td>代尔塔（中国）安全防护有限公司是法国代尔塔集<br />
    团旗下独资分支机构，前身苏州代尔塔公司创立于<br />
    2002年，现总部位于苏州吴江。公司按照营运需<br />
    求已建立了包括研发、采购、制造、外贸、国内销<br />
    售、物流和欧中工业园服务外包的业务机构。目前<br />
    公司拥有仓储面积为12000平方米、制造区域为<br />
    5000平方米的现代化综合物流与制造基地。在中<br />
    国，代尔塔的使命是以“全球防护 本地服务”的<br />
    理念提供从头到脚防护的一站式服务。</td>
  <td><img src="pictures/delta/map2.jpg" alt="1" />
    </td>
    
</tr>

<tr>


<td colspan="2"><hr /><h3>生产及转包控制</h3></td>
</tr>
<tr>
	<td>
		<img src="pictures/delta/DeltaChina02.jpg" />	</td>
	<td>
		<li>技术设计控制</li><br />
－由我们的工程及设计部创制样品；<br />－提出生产理念及要求。相当水平的生产制造技术。对转包商的评估及跟踪评估。中国代尔塔的个人防护用品都根据中国和欧洲的标准经过了严格的测试，并且标有CE字样。<br />
<li>内部实验检验及经常的外部控制。</li> 	</td>
</tr>
<tr>
<td colspan="2"><hr /><h3>仓储及物流</h3></td>
</tr>
<tr>
	<td>
		<img src="pictures/delta/DeltaChina03.jpg" />	</td>
	<td>
		<li>在中国：12000平方米的仓储面积,15000块货板的仓储容量。</li>
<li>完备的供货、交货及时、运作高效。</li> 	</td>
</tr>
<tr class="bottomYellow"><td colspan="2" align="center"><h3>加入我们</h3></td></tr>
<tr>
  <td><img src="pictures/delta/DeltaChina01.jpg" alt="1" /> </td>
  <td><p><span class="STYLE3">中国江苏省吴江区平望中鲈园欧盛大道2号<br />
    电话：<br />
    
    0512-63647000（总机）
    </span>
    
    
    
    <span class="STYLE3"><br />
      0512-63648653（销售）		0512-63648672（销售）<br />
      0512-63648673（销售）      0512-63648671（销售）<br />
      传真：    0512-63648229<br /> 
      微信:   代尔塔<br />
      微博:    <a href="http://weibo.com/deltaplus">http://weibo.com/deltaplus</a><br /> 
      电子邮件： <a href="mailto:shanghai@deltaplus.com.cn">sales@deltaplus.com.cn</a><br />  </span></p></td>
</tr>
<tr><td colspan="2"><hr /><h3>微信、微博二维码</h3></td></tr>
<tr>
	<td colspan="2">
		<img src="pictures/delta/xinlangweibo.jpg" style="height:100px;float:left;margin-right:30px;" />
		<img src="pictures/delta/weixin.jpg" style="height:100px;float:left;margin-right:30px;" />
	</td>
</tr>
</table>
