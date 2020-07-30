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
   
   
     
     $aud_id = $_GET['aud_id'];
     $aud_name = $_GET['aud_name'];
     

     // deutero meros emfanish munhmatwn

   $sql="select id, multimedia_name, multimedia_type, multimedia_size, multimedia_data 
         from chat 
         where id ='$aud_id'  and multimedia_name = '$aud_name' ";
   $result=$conn->query($sql);

        
           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   




           else
              {



           while ($row=$result->fetch_assoc())
                {
          
          
         $audio_name = $row['multimedia_name'];

         $audio_type = $row['multimedia_type'];
         
         $audio_size = $row['multimedia_size'];
        
         $audio_data = $row['multimedia_data'];
        
        
        
        $audio_data_view = '<audio controls  src="data:audio/wav;base64,' .base64_encode($audio_data) .'"  title="'.$audio_name.'"/>';
         
    
             if ($audio_type == "audio/mp3")
              {
             if  ($audio_size > 0)
                   { 
               echo "<div align='center'> <br>  <font color='black' size='4'> </b> $audio_name </b> </font>
                      <hr> $audio_data_view  
                     </div>";

              echo "<br><br>";

              echo "<div align='center'>
                     <img src='/photos/audio.gif' height='350' width='400'> 
                    </div>";
                   }
                }
                




            } // end of while chat

          
         } // end of else echo





   } // end of else data


  $conn->close();
   

  } // end of else connect


?>
