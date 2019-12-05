<script>
//为套用index.php页面框架效果，写在php里被index.php调用

    function whetherDownload()
    {
        var result=confirm("欢迎下载代尔塔产品目录！文件较大，建议链接WIFI后下载");
        if(result)
        {
            location.href="http://www.deltaplus.com.cn/docs/book.pdf";
            /*var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("post","../docs/book.pdf",true);
            xmlhttp.send();*/
        }
        else
        {
            document.writeln("没有选择任何下载内容！");
            document.title="产品介绍";  //writeln()会导致原网页内容输出打断，所以要加此设置title语句否则不显示标题而显示网址
        }
    }

    window.addEventListener("load",whetherDownload,false);

</script>