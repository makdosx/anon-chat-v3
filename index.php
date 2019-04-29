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


  require ('operating_system.php');
 
  require ('browser_safe.php');

  require ('class_connect.php'); 



?>


<!DOCTYPE html>
<html >
<head>


  <meta charset="UTF-8">

  <title> anon-chat </title>


  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


  <link href='css/family.css' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="css/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>

body
{
    
background-image: url(/photos/3.gif), url(/photos/3.gif) ,url(/photos/1.jpg);
background-position: left center, right center;
background-repeat: no-repeat, no-repeat;
background-size: 30%,  30%, cover;
    
}

</style>


  
</head>

<body>

 
   <!--
   <div align="center"> 
   <img src="/photos/3.gif" height="100" width="120"> 
   </div> 
    -->

     <div align="center"> 
       <font size="4" color="grey"> 
         <b> <i>
            Welcome to anon-chat <br>
          The conversations here are anonymous
           </i> </b>
         </font>
        </div>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab "><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      


      <div class="tab-content">

        <div id="login">   

          <div align="center"> 
             <img src="photos/redhat.png">
         </div>
             
              <br>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          
          <button class="button button-block" name="submit"/>
             LOG IN <i class="fa fa-sign-in"></i>
         </button>

          </form>

        </div>




        <div id="signup">   

          <div align="center"> <img src="photos/redhat.png"> </div> <br>
          
          <form action="signup.php" method="post">
          
          <div class="field-wrap">
            <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input type="text" name="username" required autocomplete="off" />
            </div>
        
          </div>




          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Example: mail@mail.com" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required autocomplete="off"/>
          </div>
          
          <button type="submit"  name="submit" class="button button-block"/> 
            <i class="fa fa-user-plus"></i> REGISTER 
          </button>
          
          </form>

        </div>
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->




  <script src='js/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>








<?php


    $obj = new in();


 $host = $obj->connect[0];
 $user = $obj->connect[1];
 $pass = $obj->connect[2];
 $db   = $obj->connect[3];

  
 $conn = new mysqli ($host,$user,$pass,$db);


 if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
     } 
 


   else
     {

     //katagrafh drastioriothtas
 
       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result=$conn->query($sql); 


     }


    $conn->close();





?>
