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



<style>



.table4
{
border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:1em;
height:;
width:;
position: absolute;
left:0;
top:3%;
width:100%;
text-align: center;
font-size: 18px;
}




#td_mess
{
background-color:#4080FF;
border-style:solid;
border-width:0.3em; 
border-color:#4080FF;
border-radius: 25px;
}






#td_mess2
{
background-color:#F1F0F0;
border-style:solid;
border-width:0.3em; 
border-color:#F1F0F0;
border-radius: 25px;
}



</style>



<script type="text/javascript">

/*
setInterval(function(){
      $('#reload').load('#reload');
 }, 2000);
*/


</script>



</head>


<body style="background:transparent">

  



<?php


 session_start();

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
        


   // prwto meros emfanish onomatos


  $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

  $finger = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);




     // deutero meros emfanish munhmatwn

   $sql="select * from chat where fingerprint='$finger' and message!='request_conversation' order by id desc";
   $result=$conn->query($sql);

        
           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   




           else
              {

        echo '<table class=table4>';
 
     
  //$sql2="select photo_data from profile 
    //     inner join chat on profile.username = chat._from
      //   where chat._from='".$_SESSION['login']."'";



           while ($row=$result->fetch_assoc())
                {
 
                  $id = $row['id'];
 
                  $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;


          $time = substr($row['created'], -8, 5);
          $message = wordwrap($row['message'], 50, "<br>", true);
          
          
         $mutimedia_name = $row['multimedia_name'];

         $multimedia_type = $row['multimedia_type'];
         
         $multimedia_size = $row['multimedia_size'];
        
         $multimedia_data = $row['mutimedia_data'];
        
 
 
         $photo_data_view = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>"; 
         
        
        $video_data_view = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";
                        
                        
         $photo_data_view2 = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>"; 
         
        
        $video_data_view2 = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>";           
        
       // $audio_data =  '<audio controls src="data:audio/wav;base64,' .base64_encode($row['multimedia_data']) .'"  title="'.$row['multimedia_name'].'"/>';
 
 


               // for inside avatar in messages
               // <img src='/photos/favicon.ico' height='25'  width='25'>



                // $images = array("image/jpeg","image/jpg","image/png");
                 //$audios = array("audio/wav","audio/mp3");
                // $videos= array ("video/mp4");
                 //$texts = array("text/plain","application/octet-stream");
                // $pdfs = array ("application/pdf");





             if ($row['_from'] == $_SESSION['login'])
                {
                    
              if  ($message != null)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $date $time <hr>  $message <br> </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $date $time <hr>  <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view  <br> </b> </font> 
              </td>";
                   }
                }
                
                 
            
         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess'>
         <font color='white'> $date $time <hr> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view <br> </b> </font> 
              </td>";  
                }
               }
              
              
                 }
      





        if ($row['_from'] != $_SESSION['login'])
                {
                    
              if  ($message != null)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $date $time <hr>  $message <br> </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $date $time <hr> <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view2  <br> </b> </font> 
              </td>";
                   }
                }
                
                 
            
         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess2'>
         <font color='black'> $date $time <hr> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view2 <br> </b> </font> 
              </td>";  
                }
               }
              
              
                 }






        echo "<tr> $mes </tr>";


            } // end of while chat

    echo '</table>';
          
         } // end of else echo
  
















   } // end of else data


  $conn->close();
   

  } // end of else connect


?>
