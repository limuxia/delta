<script type="text/javascript">
//<![CDATA[
var _t1 = 3; //网页打开时等待图片载入的秒数
var _t2 = 5; //切换的时间
var _tnum = 7; //图片数
var _tn = 1;//当前焦点
var _tl =null;
_tt1 = setTimeout('change_img()',_t1*1000);
function change_img(){
setFocus(_tn);
_tt1 = setTimeout('change_img()',_t2*1000);
}
function setFocus(i){
if(i>_tnum){_tn=1;i=1;}
_tl?document.getElementById('focusPic'+_tl).style.background='gray':'';
document.getElementById('focusPic'+i).style.background='white';
document.getElementById('backgroundPic').src='pictures/delta/show'+i+'.jpg';
_tl=i;
_tn++;
}
//]]>
</script>
<div style="height:354px;position:absolute;">
  <a alt="test"><img id="backgroundPic" src="pictures/delta/show1.jpg" /></a>
  <a href="javascript:setFocus(1);" alt="test1"><img id="focusPic1" style="position:absolute;top:315px;left:560px;
    width: 16px;
    height: 16px;
    background: white;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(2);" alt="test2"><img id="focusPic2" style="position:absolute;top:315px;left:590px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(3);" alt="test3"><img id="focusPic3" style="position:absolute;top:315px;left:620px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(4);" alt="test4"><img id="focusPic4" style="position:absolute;top:315px;left:650px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(5);" alt="test5"><img id="focusPic5" style="position:absolute;top:315px;left:680px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(6);" alt="test6"><img id="focusPic6" style="position:absolute;top:315px;left:710px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
  <a href="javascript:setFocus(7);" alt="test7"><img id="focusPic7" style="position:absolute;top:315px;left:740px;
    width: 16px;
    height: 16px;
    background: gray;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" /></a>
</div>
<div style="height:304px;position:absolute;top:354px;">
		<img style="float:left;" src="pictures/delta/product.gif" />
		<img style="float:left;" src="pictures/delta/code.jpg" />
		<img style="float:left;" src="pictures/delta/map1.jpg" />
</div>