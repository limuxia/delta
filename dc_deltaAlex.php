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


echo "<br>hello i am alex";
echo "<img src=\"pictures/framework/china.JPG\" />";

?>
</div>