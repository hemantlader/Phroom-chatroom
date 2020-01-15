<?php
  /* */
    define('DB_HOST','localhost');
    define('DB_NAME','phroom');
    define('DB_USER','root');
    define('DB_PASSWORD','');
date_default_timezone_set("Asia/Kolkata");
    $link = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link)
        die( ' Failed to Connect:'. $link->connect_error);
?>