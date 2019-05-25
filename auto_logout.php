<?php


/*
 * Copyright (c) 2016-2019 Barchampas Gerasimos <http://chat.openloadlinks.com>
 * anon-chat-v2 is a program that allows anonymous conversations.
 *
 * anon-chat-v2 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * anon-chat-v2 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */


session_start();
 
 require('class_connect.php');

 $obj = new in;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

  
 $conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
     } 


     else
       {

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql0="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result0=$conn->query($sql0);  


    $sql="update login set is_inside='no' where username='".$_SESSION['login']."'";
    $result=$conn->query($sql); 


    $sql2="update users_online set is_inside='no' where username='".$_SESSION['login']."'";
    $result2=$conn->query($sql2); 



    $sql3="update users_activities set log_out_time=NOW() 
           where username='".$_SESSION['login']."' and fingerprint='".$_SESSION['fingerprint']."'";
    $result3=$conn->query($sql3);



       $now=time();
         if ($now > $_SESSION['expire'])
           {
         session_unset();
        session_destroy();    
       header('Location: index.php');
        }


  
   } // end of else  data

?>
