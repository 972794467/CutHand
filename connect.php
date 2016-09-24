<?php 
 require_once('connectMysqli.php');
 require_once('config.php');
 
 $conDB = new ConnectDatabase(DATABASE_DBNAME);
 $sql='insert into admin(username,password,email) values("学文化的流氓","123456","998998@qq.com")';
 $conDB->query($sql);

 
 
 
