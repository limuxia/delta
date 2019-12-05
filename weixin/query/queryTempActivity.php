	 <script src="js/Calendar.js"></script>
	<form name="activityRecards" method="post" action="query.php?query=getTempActivity">
		活动编号：<input type="text" name="activityNo" /><br />
		活动名称：<input type="text" name="activityName" /><br />
		活动期间：<br />
		从
<div>
            <input type="text" name="activityStart" /><a href="javascript:show_calendar('activityRecards.activityStart');"
                onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;"><img
                    alt="日期" src="js/calendar.gif" style="border-top-style: none; border-right-style: none;
                    border-left-style: none; border-bottom-style: none" /></a>
        </div>
		 到
 <div>
            <input type="text" name="activityEnd" /><a href="javascript:show_calendar('activityRecards.activityEnd');"
                onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;"><img
                    alt="日期" src="js/calendar.gif" style="border-top-style: none; border-right-style: none;
                   border-left-style: none; border-bottom-style: none" /></a>
        </div>			  
		<input type="submit" value="查询" />
	</form>