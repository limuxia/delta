<div id="content">

<?php

include("connectDB.php");
$sql = "select a.answerName,b.className
        from Answer as a
        left join AnswerClass as b on b.classId=a.classId
        where a.id={$_REQUEST['answerId']}
		order by a.id desc";
if($result = mysql_query($sql))
{
    if($row=mysql_fetch_row($result))
    {
        echo "<div>
			<p class='title pMargin0'>{$row[0]}</p>
			<img style='max-width:100%' src='pictures/answer/{$row[1]}-{$row[0]}.png' />
		</div>";

    }
}


mysql_close();

?>

</div>