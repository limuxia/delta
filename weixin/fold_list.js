function fold_list(element_id) {     //遍历element_id中的<li>与<div>
  var lis = document.getElementById(element_id).getElementsByTagName("li");
  var divs = document.getElementById(element_id).getElementsByTagName("div");

  /*//默认展开第一个div列表
  var li_divs = lis[0].getElementsByTagName("div");
  for (var j=0; j<li_divs.length; j++){
     if (li_divs[j].className == "fold"){
          li_divs[j].className = "list";
      }
  } */

  for (var i=0; i<lis.length; i++){
      lis[i].onclick = function(){
      //查找已展开的<div>并将其隐藏
        for (var j=0; j<divs.length; j++){
            if (divs[j].className == "list"){
                divs[j].className = "fold";
            }
        }
      //展开当前<div>
        li_divs = this.getElementsByTagName("div");
        for (var j=0; j<li_divs.length; j++){
            if (li_divs[j].className == "fold"){
                li_divs[j].className = "list";
            }
        }
      }
  }

}

window.onload = function(){
  fold_list('trade_risk');
}