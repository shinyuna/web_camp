<?php
   try{
    $db = new PDO("mysql:host=localhost; dbname=web20170626; charset=utf8","root","MYPASSWORD123");
}
catch(PDOException $e){
    //  echo $e->getMessage();
    //  echo $e->getCode();
    // echo "일시적인 장애 : 잠시 후 다시 시도...";
    exit;
}