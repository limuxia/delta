<div class="news">
<?php
function switchcolor()
 { 
   static $col;
   $couleur1 = "#FDE9E0";
   $couleur2 = "#FFFFFF";

    if ($col == $couleur1)
     {
       $col = $couleur2;
     }
    else
     {
       $col = $couleur1;
     }
    return $col; 
}

//echo '<table><tbody><tr><td ></td></tr></tbody></table>';

echo "<table>
        <tr><td colspan='2'><img src='pictures/framework/calendar.jpg' /></td></tr>
        <!-- <tr><td colspan='2'><strong>&nbsp&nbsp请选择适合您显示器长宽比的日历壁纸包下载</strong></td></tr> -->
        <tr><td colspan='2'>&nbsp</td></tr>
        <tr align='center'> 	 
          <!-- <td><form action=\"download/IPAD4-3.zip\"  method=post ><input type=submit value=\"IPAD 4:3\" class='buttonRoundCorner' /></form></td> -->

          <td><form action=\"download/HDMI16-9.zip\"  method=post ><input type=submit value=\"HDMI 16:9\" class='buttonRoundCorner' /></form></td>

          <!-- <td><form action=\"download/RETINA16-10.zip\" method=post ><input type=submit value=\"RETINA 16:10\" class='buttonRoundCorner' /></form></td> -->
        </tr>
      </table>";
?>

</div>