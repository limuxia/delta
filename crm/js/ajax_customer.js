// ajax 更新 customer 指定字段
function update_customer(id, field, value){
	if(id.length == 0 || id < 1){
		return; // ID 为空或无效时避免更新报错
    }
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
			if(xmlhttp.status !=200){
				alert(xmlhttp.responseText);
				return;				
			}
		}
	}
	
	//加 encodeURI() 解决IE传中文乱码问题
	var url = encodeURI("ajax.php?ajax=customer_update&id=" + id + "&field=" + field + "&value=" + value);

	xmlhttp.open("get", url, true);	
	xmlhttp.send();	
}

// ajax 获取 customer 数据：json 格式 -- 未使用
var customer = '';	//注意：默认赋空值避免调用出错
function get_customer(id){
	if(id.length == 0){
		return; // 禁止空数据请求占用服务器资源
    }
	// 先清空
    customer = '';
    var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			if(xmlhttp.responseText!=""){
				customer = eval("("+xmlhttp.responseText+")");	// ajax 异步无法返回值只好全局变量赋值
				return;
            }
		}
	}
	
    var url = "ajax.php?ajax=customer_get&id=" + id;
	xmlhttp.open("get", url, false); //同步
	xmlhttp.send();	
}

// ajax 获取 customer 数据列表：json 格式
var listCustomer = '';	//注意：默认赋空值避免调用出错
function get_listCustomer(keyword){
	if(keyword.length == 0){
		return; // 禁止空数据请求占用服务器资源
    }
    
	// 先清空
	listCustomer = '';
    var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			if(xmlhttp.responseText!=""){
				listCustomer = eval("("+xmlhttp.responseText+")");	// ajax 异步无法返回值只好全局变量赋值
				return;
            }
		}
	}
	
    var url = "ajax.php?ajax=customer_list&keyword=" + keyword;
	xmlhttp.open("get", url, false); //同步
	xmlhttp.send();	
}

// 检索客户名称关键字生成 select 列表
function filter_customer(keyword, container){
    //加入必须 >= 3个字符
    if(keyword.length < 3){ return; }

    get_listCustomer(keyword);
    
    var select = document.getElementById('customer_list');
    if(select == null){     //如果不存在则创建           
        select = document.createElement('select');
        select.size = 6;  // 避免显示过多拉长屏幕
        select.id = 'customer_list';
        select.setAttribute('onchange', "fill_customer(this.value); this.className='hidden';"); // 选择后隐藏
    }
    else{
        var select_parent = select.parentNode;
    }
    select.options.length = 0;  //清空数据
    if(listCustomer.length > 0){
        for(var i=0; i<listCustomer.length; i++){
            option=document.createElement('option');
            option.value = i;
            option.text = listCustomer[i].name + ' ' + listCustomer[i].area + ' ' + listCustomer[i].group_company;
            select.add(option);
        }
    }

    //生成列表后显示 -- 如果存在先删除先前列表
    if(select_parent != null){select_parent.removeChild(select);}
    container.appendChild(select);
    select.className = 'form-control'; // 去除隐藏启用样式 -- 列表选择后会隐藏
}

// 从 json 中获取 customer 并填充相关表单
function fill_customer(json_index){
    // 防止空检索
	if(json_index.length == 0){ return; }
	
    // 重置按钮
    var button1 = document.createElement('button');
    button1.innerText = '清除';
    button1.type = 'button';
    button1.className = 'btn';
    button1.id = 'button_reset_customer';  // 备留访问
    button1.setAttribute('onclick', 'reset_customer(); this.parentNode.removeChild(this);');  // 重置后移除按钮

    $('#customer-id').val(listCustomer[json_index].id); 
    $('#customer-name').val(listCustomer[json_index].name);   
    $('#customer-name').attr('readonly', 'true');
    $('#customer-name').parent().append(button1);  // 重置按钮
    $('#customer-area').val(listCustomer[json_index].area);
    
    // 设置选中
    $("[name='customer[customer_nature_id]']").each(function(index){
        if(this.value == listCustomer[json_index].customer_nature_id){
            this.checked = true;
        }
    }); 

    $('#customer-group_company').val(listCustomer[json_index].group_company);
}

// 清除 当前选中填充后 readonly 不能更改的 customer 以重新选择或输入
function reset_customer(){
    $('#customer-id').val('');        
    $('#customer-name').val('');      
    $('#customer-name').removeAttr('readonly');
    $('#customer-area').val('');

    // 取消选中项
    $("[name='customer[customer_nature_id]']").removeAttr('checked');

    $('#customer-group_company').val('');
}
