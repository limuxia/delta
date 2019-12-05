<!-- 用于剪切板 -->
<script src="js/clipboard.js-master/dist/clipboard.min.js"></script>
<script>
	var clipboard = new ClipboardJS('.btn');

	clipboard.on('success', function(e) {
		e.clearSelection();
	});

	clipboard.on('error', function(e) {
		alert("您的浏览器不支持！");
	});
</script>
<div class="edge3">
	<div>
		<div>
			<p style="width:50%;float:left;padding-right:10px;">天猫旗舰店：</p>
			<p style="float:left;padding-left:10px;"><a class="buttonStyle2 btn" data-clipboard-text="【deltaplus代尔塔旗舰店】，复制这条信息￥lpAj0u3Mrjo￥后打开手淘[来自超级会员的分享]" href="#">点击复制淘口令</a></p>
		</div>
		<div class="clearFloat"></div>
		<p>https://deltaplus.tmall.com/</p>
	</div>
	<div>
		<div>
			<p style="width:50%;float:left;padding-right:10px;">京东旗舰店：</p>
			<p style="float:left;padding-left:10px;"><a class="buttonStyle2" href="https://mall.jd.com/index-124313.html">点击进入</a></p>
		</div>
		<div class="clearFloat"></div>
		<p>https://mall.jd.com/index-124313.html</p>
	</div>
	<div>
		<div>
			<p style="width:50%;float:left;padding-right:10px;">阿里巴巴旗舰店：</p>
			<p style="float:left;padding-left:10px;"><a class="buttonStyle2 btn" data-clipboard-text="【DELTAPLUS/代尔塔官方旗舰店】复.制，￥xUdl7C32aBao￥，在【手机阿里】或【支付宝】查看。https://qr.1688.com/share.html?secret=1WU3T8Wz" href="#">点击复制阿里口令</a></p>
		</div>
		<div class="clearFloat"></div>
		<p>https://deltapluschina.1688.com/</p>
	</div>
	<div>
		<div>
			<p style="width:50%;float:left;padding-right:10px;">生活日用旗舰店：</p>
			<p style="float:left;padding-left:10px;"><a class="buttonStyle2" href="https://mall.jd.com/index-681006.html">点击进入</a></p>
		</div>
		<div class="clearFloat"></div>
		<p>https://mall.jd.com/index-681006.html</p>
	</div>
</div>
