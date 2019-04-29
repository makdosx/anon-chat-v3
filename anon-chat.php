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

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }


?>

<html>
<head>

 <title> anon-chat </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style>

html,
body
{
height: 100%;
background: url(/photos/) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;

background-color: #252522;
}



.centered {
  position: fixed;
  top: 60%;
  left: 35%;
  margin-top: -50px;
  margin-left: -100px;
}



#block {
  display: block;
  width: 50%;
  border: none;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}



.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}



.loader {
  height: 15px;
  width: 100%;
  position: relative;
  overflow: hidden;
  background-color: #ddd;
}
.loader:before{
  display: block;
  position: absolute;
  content: "";
  left: -200px;
  width: 200px;
  height: 15px;
  background-color: #2980b9;
  animation: loading 2s linear infinite;
}

@keyframes loading {
    from {left: -200px; width: 30%;}
    50% {width: 30%;}
    70% {width: 70%;}
    80% { left: 50%;}
    95% {left: 120%;}
    to {left: 100%;}
}


</style>




</head>



<body>

<br>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

     

     <div align="center">
     <font color="white" size="4"> 
       <b> Anon Chat V2 </b> <br>
       Welcome <i> <?php echo  $_SESSION["login"]; ?> ! </i>
      </font> 
        <br>
      <img src="photos/3.gif" height="250" width="300"> 
      </div>
 

   
    

 <div class="centered">

  
  
    <button type="button" onclick="location.href='chat.php';" class="btn btn-primary btn-lg " id="#block"> 
     	<span class="glyphicon glyphicon-hand-left"></span>
     	   &nbsp;
     <font color="white" size="5"> <b> Anonymous chat &nbsp; </b> </font> 
          &nbsp;
    	<span class="glyphicon glyphicon-comment"></span>
     </button>
   
      &nbsp; &nbsp;

 <button type="button" onclick="location.href='forum.php';" class="btn btn-danger btn-lg" id="#block"> 
     	<span class="glyphicon glyphicon-comment"></span>
     	   &nbsp;
     <font color="white" size="5"> <b> Anonymous forum </b> </font> 
           &nbsp;
    	<span class="glyphicon glyphicon-hand-right"></span>
     </button>

  
</div>
 



  <div class="footer">
 
  <div class="loader"></div>

   </div>




</body>
</html>
