<?php

/*
 * Copyright (c) 2016-2020 Barchampas Gerasimos 
 * anon-chat-v3 is a program that allows anonymous conversations.
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


?>


<html>
<head>
    
  

   <title> anon-chat </title>


  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">




</head>


<body style="background:white" oncontextmenu="return false;">

  



<?php



 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }




 else
  {


  require ('class_connect.php'); 

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
        


   // prwto meros pairnw sunedria kai onoma
   
   
     
     $txt_id = $_GET['txt_id'];
     $txt_name = $_GET['txt_name'];
     

     // deutero meros emfanish munhmatwn

   $sql="select id, multimedia_name, multimedia_type, multimedia_size, multimedia_data 
         from chat 
         where id ='$txt_id'  and multimedia_name = '$txt_name' ";
   $result=$conn->query($sql);

        
           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   




           else
              {



           while ($row=$result->fetch_assoc())
                {
          
          
         $txt_name = $row['multimedia_name'];

         $txt_type = $row['multimedia_type'];
         
         $txt_size = $row['multimedia_size'];
        
         $txt_data = $row['multimedia_data'];
        
        
        
        $text_data_view = $txt_data;
         
    
             if ($txt_type == "text/plain")
              {
             if  ($txt_size > 0)
                   { 
                   echo "<div align='center'> <br>
                           <font size='4'> <b> $txt_name </b> </font> 
                           <hr>
                           $text_data_view
                           <br><br><br>
                          <span class='glyphicon glyphicon-text-size' style='font-size:75px;'></span>
                          </div>";
                   }
                }
                




            } // end of while chat

          
         } // end of else echo





   } // end of else data


  $conn->close();
   

  } // end of else connect


?>
