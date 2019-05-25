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


 if (isset($_POST['submit']))
  {


  require ('class_connect.php'); 

    $obj = new in();


 $host = $obj->connect[0];
 $user = $obj->connect[1];
 $pass = $obj->connect[2];
 $db   = $obj->connect[3];

$conn = mysqli_connect($host,$user,$pass,$db);

  if($conn->connect_error)
   {
    die ("Cannot connect to server " .$conn->connect_error);
    }


  else
    {


$username=$_POST['username'];
$password=md5($_POST['password']);


     $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
   $username = trim($username);
   $password = trim($password);
   $username = stripslashes($username);
  $password = stripslashes($password);
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password); 


  $sql = "select * from login where binary password='$password' AND username='$username' and verified='yes'";
  $result=$conn->query($sql);

  if (($result->num_rows)>0)
       {

    $sql2="update login set is_inside='yes' where username='$username'";
    $result2=$conn->query($sql2);

     
      $sql3="update users_online set is_inside='yes' where username='$username'";
      $result3=$conn->query($sql3);
     

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql4="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
    $result4=$conn->query($sql4);    


      require ('browser_user.php');

     $finger = substr(str_shuffle(str_repeat("0123456789ABCDEF", 32)), 0, 32);

     $sql5="insert into users_activities (username,ip_addr,browser,log_in_time,fingerprint)
            values('$username','$ip_addr','$yourbrowser',NOW(),'$finger')";
     $result5=$conn->query($sql5);

   
    $_SESSION['fingerprint']=$finger;

    $_SESSION['start'] = time();

    $_SESSION['expire'] = $_SESSION['start'] + (3600);  

    $_SESSION['login']=$username;
    

   $length1 = 30;
   $rand1= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $length1);
        setcookie("userbox",$rand1,time() - 3600,"/",false,true);
       
 
  header("Location: anon-chat.php"); 
    }
 

 else 
  {
  header('Location: index.php');
  }



  }// end of else connect


 $conn->close(); 
 
 
 } // end of isset submit


?>
