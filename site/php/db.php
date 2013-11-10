<?php

require_once("config.php");

function db_connect(){
  $connection = mysql_connect($_DB_HOST, $_DB_USER, $_DB_PASSWORD);
  if(!$connection){
    die("Connexion impossible :".mysql_error());
  }

  $err = mysql_select_db($_DB_NAME);
  
  if($err){
    die("Probleme lors de la selection de la base:".mysql_error());
  }
  
  return $connection;
}
 

function db_close(){
  mysql_close();
}
?>