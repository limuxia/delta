//验证邮件地址正确性
function validate_form(thisform){
    function validate_mail(field,alerttxt){
        with (field)
        {
            apos=value.indexOf("@")
            dotpos=value.lastIndexOf(".")
            if (apos<1||dotpos-apos<2)
            {alert(alerttxt);return false}
            else {return true}
        }
    }
    with (thisform)
    {
        if (validate_mail(mail,"Not a valid mail address!")==false)
        {mail.focus();return false}
    }
}