/*rule  验证规则(部分用正则表达式)：
        notNull                 非空
        length                  长度
        minLength               最小长度
        email                   邮箱              ^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$
        date                    日期              ^[0-9]{4}[-,/](((0[13578]|(10|12))[-,/](0[1-9]|[1-2][0-9]|3[0-1]))|(02[-,/](0[1-9]|[1-2][0-9]))|((0[469]|11)[-,/](0[1-9]|[1-2][0-9]|30)))$
        number                  x位数字            ^[0-9]{x}$
        notNegativeInteger      非负整数            ^[1-9]{1}[0-9]{0,}$
        notNegativeDecimal      非负小数            ^[0-9]{1,}[.]{1}[0-9]{1,}$
        notNagetive             非负整数或小数     (^[1-9]{1}[0-9]{0,}$)|(^[0-9]{1,}[.]{1}[0-9]{1,}$)
        fileCheck               上传文件大小和上传数量限制，单位M（注：最后一个参数是数量，0为不限制）
        choiceCheck             radio/checkbox至少选择一个验证(请至少给某一个选择项设置id用于value取值和focus光标定位)

使用方法：为form添加onsubmit事件传递要验证表单的id和规则，比如 onsubmit="return validate(new Array(new Array('inputId1','xxx','date'),new Array('inputId2','xxx','length',6)))"
            不使用表单名是因为有时要传递表单数组，表单名是相同的，如inputName[]
*/
function validate(inputArray){
        var regExpValidate, element, prompt, rule;
        for (var i in inputArray)
        {
            element = document.getElementById(inputArray[i][0]);
            prompt = inputArray[i][1];
            rule = inputArray[i][2];

            if (element.value == "")
            {
                if (rule=="notNull")
                {
                    alert(prompt + " 不能为空");
                    element.focus();
                    return false;
                }
            }
            else
            {
                switch (rule) {
                    case 'choiceCheck':
                        var inputs=document.getElementsByName(inputArray[i][3]);
                        var l=inputs.length;
                        var j;
                        for(j=0;j<l;j++)//此处不能用for in
                        {
                            if(inputs[j].checked)
                            {
                                break;  //注意：此break是跳出for循环
                            }
                        }
                        if(j==l)    //没有一个被选中
                        {
                            alert(prompt+"：至少要选择一个！");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'fileCheck':
                        var maxSize = inputArray[i][3];
                        var maxCount=inputArray[i][4];
                        var files1 = element.files;
                        if(maxCount==0 || files1.length<=maxCount)
                        {
                            //即便没有上传文件或只上传一个文件也可正常工作
                            for (var i in files1)
                            {
                                if (files1[i].size > maxSize * 1000000)
                                {
                                    alert(prompt + " 上传的每个文件大小不能超过 " + maxSize + "M");
                                    element.focus();
                                    return false;
                                }
                            }
                        }
                        else
                        {
                            alert(prompt+"只能上传 1-"+maxCount+" 张图片！");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'length':
                        var length = inputArray[i][3];
                        if (element.value.length != length) {
                            alert(prompt + " 长度必须为" + length);
                            element.focus();
                            return false;
                        }
                        break;
                    case 'minLength':
                        var length = inputArray[i][3];
                        if (element.value.length < length) {
                            alert(prompt + " 长度至少为" + length);
                            element.focus();
                            return false;
                        }
                        break;
                    case 'email':
                        regExpValidate = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 不是正确的邮箱地址！");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'date':
                        regExpValidate = new RegExp("^[0-9]{4}[-,/](((0[13578]|(10|12))[-,/](0[1-9]|[1-2][0-9]|3[0-1]))|(02[-,/](0[1-9]|[1-2][0-9]))|((0[469]|11)[-,/](0[1-9]|[1-2][0-9]|30)))$");
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 日期格式不正确：yyyy/mm/dd或yyyy-mm-dd");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'number':
                        length = inputArray[i][3];
                        regExpValidate = new RegExp('^[0-9]{' + length + '}$');
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 必须为" + length + "位数字！");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'notNegativeInteger':
                        regExpValidate = new RegExp('^[1-9]{1}[0-9]{0,}$');
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 必须为非负整数");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'notNagetiveDecimal':
                        regExpValidate = new RegExp('^[0-9]{1,}[.]{1}[0-9]{1,}$');
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 必须为非负小数");
                            element.focus();
                            return false;
                        }
                        break;
                    case 'notNagetive':
                        regExpValidate = new RegExp('(^[1-9]{1}[0-9]{0,}$)|(^[0-9]{1,}[.]{1}[0-9]{1,}$)');
                        if (!regExpValidate.test(element.value)) {
                            alert(prompt + " 必须为非负整数或小数");
                            element.focus();
                            return false;
                        }
                        break;
                }
            }
        }

        return true;
}