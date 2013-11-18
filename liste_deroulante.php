<?php
//db_connect(); //connexion a la base si c'est pas deja fait
$platforms = select_platforms();

echo "<select name=\"nomPlateforme\" class=\"form-control\">";

while($att = mysql_fetch_array($platforms)){
  $name = $att["nomPlateForme"];
  echo "<option value=\"$name\">$name</option>";

}
echo "</select>";
?>