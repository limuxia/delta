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

include("config/dbconnect.php");
$sql = "SELECT date,title,id FROM news ORDER BY id DESC";
$req = mysql_query($sql) or die("Erreur SQL !".$sql."".mysql_error());
echo '<table cellspacing="0">';
while ($data = mysql_fetch_array($req)){
$col=switchcolor();
echo '<form method="post" action="index.php?dir=&page=delta_news_descr">';
echo '<tr><td><td><img src="pictures/delta/circle.JPG"/></td><td bgcolor=';
echo $col;
echo '>';
echo $data['date'];
echo '</td><td bgcolor=';
echo $col;
echo '>';
echo $data['title'];
echo '<input type="hidden" name="id_news" value="';
echo $data['id'];
echo '"/></td><td><input type="submit" value="更多" name="valid"/></td></tr></form>';
}
echo '</table>';
mysql_close();
?>
</div>