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



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
background: url(/photos/1.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}






#form1
{
position:fixed;
bottom:0;
left:0;
margin: auto;
padding: 10px;
width: 100%;
}



.chat
{
height:90px;
width:40%;
position: fixed;
left: 30%;
bottom: -3%;
text-align:center;
font-size:17px;
word-wrap: break-word;
word-break: break-word;
background:#DBD8F8;
color:black;
border-style:solid;
border-width:0.2em;
border-color:silver;
}



#button
{
height:2.5em;
width:17em;
}




#del
{
position:fixed;
bottom:11%;
right:40%;
width:20%;
text-decoration:none;
display:inline-block;
line-height:50px;
background:#737373 url('/photos/delete.png') no-repeat 90% center;  /* orizei to megethos ths einonas kai xrwma mazi*/
text-align:center;
color:white;
border-style:solid;
border-width:0.1em; 
border-radius: 10px;
border-color:silver;
font-size:13px;
}



#del:hover
{
position:fixed;
bottom:11%;
right:40%;
width:20%;
text-decoration:none;
background-color:white;
display:inline-block;
line-height:50px;
background:#ff4d4d url('/photos/delete.png') no-repeat 90% center;  /* orizei to megethos ths einonas kai xrwma mazi*/
text-align:center;
color:white;
border-style:solid;
border-width:0.1em; 
border-radius: 10px;
border-color:silver;
font-size:13px;
}


#conv_user
{
position: fixed;
top:0%;
left:5%;
width:90%;
font-size:30px;
background-color:;
color:black;
text-align:center;
}



#conv_user:hover
{
position:fixed;
top:0%;
left:5%;
width:90%;
font-size:30px;
background-color:;
color:black;
text-align:center;
}




#img_close
{
position:fixed;
top:0%;
right:0%;
height:40px;
width:50px;
}




#img_close:hover
{
position:fixed;
top:0%;
right:0%;
height:45px;
width:55px;
}



#footer
{
position: fixed;
left: 1%;
bottom: 0%;
}



.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: fixed;
  bottom: 0%;
  left: 0%;
  width: 10%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  background: red;
  cursor: inherit;
  display: block;
}
input[readonly] {
  background-color: white !important;
  cursor: text !important;
}



/*
.container
{
position: fixed;
top: 50%;
left: 50%;
margin-top: -50px;
margin-left: -100px;
}
*/

.table4
{
position: fixed;
top: 20%;
left: 38%;
margin-top: -50px;
margin-left: -100px;

border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:1em;
display: block;
height: 60%;
overflow-y: auto;
width: 100%;
text-align: center;
font-size: 18px;



}



#tr_mess
{
width: 100%;    
}



#td_mess
{
background-color:#4080FF;
border-style:solid;
border-width:0.3em; 
border-color:#4080FF;
border-radius: 25px;
width: 100%; 
}



#td_mess2
{
background-color:#F1F0F0;
border-style:solid;
border-width:0.3em; 
border-color:#F1F0F0;
border-radius: 25px;
width: 100%; 
}



#avatar1
{
height: 10%;
width: 7%;
border-radius: 50%;
}



#avatar2
{
object-fit: cover;
height: 60px;
width: 60px;
border-radius: 50%;
}



#td_default_mess
{
width: 100%; 
}


#hr
{
color: #f00;
background-color: #f00;
height: 5px;
width: 500px;
}


</style>



<script>
function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
</script>




<script type="text/javascript">

/*
 setInterval(function()
    {
    $("#reload").load(location.href + " #reload1");
    },2000);
*/



var time = new Date().getTime();

var refreshTime =  1000;

$(document).bind("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error hover change", function (e) {
    time = new Date().getTime();
});

function refresh() {
    if (new Date().getTime() - time >= refreshTime) {
        $('#reload').load("#reload1");

    } else {
        setTimeout(refresh, refreshTime);
    }
}

setTimeout(refresh, refreshTime);
    
</script>






</head>



 <body>


<br><br>

   
  <a href="javascript:close_window();" id="close_tab"><img src="/photos/close.png" id="img_close" title="close conversation"></a>



  <script>
    function close_window() 
      {
     if (confirm("Do you want to close this conversation?"))
        {
    close();
       }
     }
 </script>


</body>
</html>




<?php


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



   
  $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

  $finger = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);



    // prwto meros emfanish onomatos kai avatar


    $sql0 = "select _from,_to from chat where fingerprint='$finger' and message='request_conversation'";
    $result0 = $conn->query($sql0);

     
        while ($row0 =  $result0->fetch_assoc())
         {
          $_from = $row0['_from'];
          $_to   = $row0['_to'];
          }


          if ($_from == $_SESSION['login'])
             {
                 
            $sql001 = "select photo_data from avatar where username = '$_to'";
            $result001 = $conn->query($sql001);

           while ($row001 = $result001->fetch_assoc())
              {   
             $avatar_data_to = $row001['photo_data'];
             $avatar_to = '<img id="avatar1" src="data:image/jpeg;base64,'. base64_encode($avatar_data_to) .'"/>';
              }
                 
           echo "<div id='conv_user'> 
                  $avatar_to $_to
                    <hr>
                </div>";
                }
                
             
          
         
         else if ($_from != $_SESSION['login'])
             {
                 
            $sql002 = "select photo_data from avatar where username = '$_from'";
            $result002 = $conn->query($sql002);

           while ($row002 = $result002->fetch_assoc())
              {   
             $avatar_data_from = $row002['photo_data'];
             $avatar_from = '<img id="avatar1" src="data:image/jpeg;base64,'. base64_encode($avatar_data_from) .'"/>';
              }
                 
           echo "<div id='conv_user'> 
                  $avatar_from $_from
                    <hr>
                </div>";
                } 
 
 







// emfanish munhmatwn


/*
   
echo "<div id='reload'>
     <div id='reload1'> 
     <div align='center'>
      <iframe src='chat_messages.php?fingerprint=$finger' width='60%' height='65%'
       style='opacity:1; box-shadow:none; filter: chroma(color=#FFFFFF)' framespacing=0 frameBorder='0' scrolling='auto' allowTransparency='true'>
      </iframe>
       </div> </div> </div>";

*/



 $sql="select * from chat where fingerprint='$finger' and message!='request_conversation' order by id desc";
 $result=$conn->query($sql);
 


           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   




           else
             {
                 
        
        echo '<div id="reload">
              <div id="reload1">
              <table class="table4">';
 
     
  //$sql2="select photo_data from profile 
    //     inner join chat on profile.username = chat._from
      //   where chat._from='".$_SESSION['login']."'";


            echo "<td id='td_default_mess'>
                    <font color='white'> <hr id='hr'> </font> 
              </td>";


           while ($row=$result->fetch_assoc())
                {
 
                  $id = $row['id'];
 
                  $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;


          $time = substr($row['created'], -8, 5);
          
          $from =  $row['_from'];
          
         $avatar_data = $row['avatar'];
         $avatar = '<img id="avatar2" src="data:image/jpeg;base64,'. base64_encode($avatar_data) .'"/>';
          
          $to   =  $row['_to']; 
          
          $message = wordwrap($row['message'], 50, "<br>", true);
          
          
         $mutimedia_name_0 = $row['multimedia_name'];
         $mutimedia_name = wordwrap($mutimedia_name_0, 50, "<br>", true);

         $multimedia_type = $row['multimedia_type'];
         
         $multimedia_size = $row['multimedia_size'];
        
         $multimedia_data = $row['multimedia_data'];
        
 
 
         $photo_data_view = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>"; 
         
        
        $video_data_view = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";
                        
                        
         $photo_data_view2 = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>"; 
         
        
        $video_data_view2 = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name_0' target='_blank'>
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
                    <font color='white'>  $avatar $date $time <hr>  $message <br> </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view  <br> </b> </font> 
              </td>";
                   }
                }
                
                 
            
         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view <br> </b> </font> 
              </td>";  
                }
               }
              
              
                 }
      





        if ($row['_from'] != $_SESSION['login'])
                {
                    
              if  ($message != null)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time <hr>  $message <br> </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time <hr> <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view2  <br> </b> </font> 
              </td>";
                   }
                }
                
                 
            
         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time <hr> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view2 <br> </b> </font> 
              </td>";  
                }
               }
              
              
                 }






        echo "<tr id ='tr_mess'> $mes </tr>";


            } // end of while chat

    echo '</table> </div> </div>';
          
         } // end of else echo






 echo  "<div align='center'>
         <form action='delete_chat_messages.php?fingerprint=$finger' method='post'/>
                <input type='submit'  name='delete_submit' value='Delete Conversation &nbsp; &nbsp;' id='del'/> 
        </form>
         </div>";



echo'
 <div align="center">
  <form action="" method="POST" id="form1">
      <br><br>
   <input type="text"  class="chat" name="chat_text" maxlength="512" autofocus="autofocus"  required>
    <br><br>
  <input type="hidden" name="chat_submit" value="Send" id="button">
  </form>
  </div>



    <div id="footer">
   
     <form action="" method="post" enctype="multipart/form-data">
         
	<div class="form-group col-xs-3">
		<div class="input-group input-file" name="multimedia">
			<span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button">Choose</button>
    		</span>
    		<input type="text" class="form-control" placeholder="Choose a file..." />
    		<span class="input-group-btn">
       			 <button class="btn btn-primary pull-right" name="submit_multimedia" type="submit"> upload </button>
    		</span>
		</div>
	</div>
   
     </form>
     
    </div> ';




// deutero meros apostolh mhnumatos


  if(isset($_POST['chat_submit']))   
    {
  
   $sql01="select id2 from chat where fingerprint='$finger'";
   $result01=$conn->query($sql01);

 
     while ($row01 = $result01->fetch_assoc())
       {


     $id2 = $row01['id2'];
       

     } // end of while for id2



  $chat_text=$_POST['chat_text'];


    $chat_text = htmlspecialchars($chat_text);
   $chat_text = trim($chat_text);
  $chat_text = stripslashes($chat_text);
  $chat_text = $conn->real_escape_string($chat_text); 

  $i = substr(str_shuffle(str_repeat("0123456789", 10)), 0, 10);

  $ip_from = $_SERVER['REMOTE_ADDR'];
  
 
 
  $sql2="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
         SELECT '$id2', '{$_SESSION['login']}','$ip_from','chat','$chat_text',NOW(),'request$i','request$i','request$i','$finger', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ";
  $result2=$conn->query($sql2);

       if ($result2)
              {    

         $sql3="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
                SELECT '$id2', '{$_SESSION['login']}','$ip_from','chat','$chat_text',NOW(),'request$i','request$i','request$i','$finger', photo_data 
                FROM avatar WHERE username = '{$_SESSION['login']}' ";
         $result3=$conn->query($sql3);
        
         
                    exit();
                          }
                     

                  else
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent message");
              </script>';
                          }  
                       
             
   

                     
     }  // end of if send message







   // insert photo
   
     if (isset($_POST['submit_multimedia']))
       {
           
        $multimedia_name = $conn->real_escape_string($_FILES['multimedia']['name']);
        $multimedia_type = $conn->real_escape_string($_FILES['multimedia']['type']);
        $multimedia_size = $_FILES['multimedia']['size'];
        $multimedia_data = $conn->real_escape_string(file_get_contents($_FILES ['multimedia']['tmp_name']));
       
       $maxsize=16777216;
      
       // echo $photo_name ."<br>" .$photo_type ."<br>" .$photo_size ."<br>" .$photo_data;
      
     if (empty(file_get_contents($_FILES ['multimedia']['tmp_name'])))
               {
               echo '<script type="text/javascript">alert("Error. your file is empty or than bigest to 2mb ");
            </script>';
                } 
                
                
          else
            {
                
                
           $sql4="select id2 from chat where fingerprint='$finger'";
           $result4=$conn->query($sql4);

 
     while ($row4 = $result4->fetch_assoc())
       {


      $id3 = $row4['id2'];
       

     } // end of while for id2



  $ip_from2 = $_SERVER['REMOTE_ADDR'];
  $i2 = substr(str_shuffle(str_repeat("0123456789", 10)), 0, 10);
  

/*
  $sql5="INSERT INTO chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint)  VALUES('$id3','{$_SESSION['login']}','$ip_from2','chat','$multimedia_name','$multimedia_type','$multimedia_size','$multimedia_data',NOW(),'request$i2','request$i2','request$i2','$finger')";
  $result5=$conn->query($sql5);
*/
 

   $sql5="INSERT INTO chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint, avatar) 
         SELECT '$id3', '{$_SESSION['login']}','$ip_from2','chat','$multimedia_name', '$multimedia_type','$multimedia_size','$multimedia_data', NOW(),'request$i2','request$i2','request$i2','$finger', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ";
$result5=$conn->query($sql5);



       if ($result5)
              {    


        $sql6="INSERT INTO backup_chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint) 
        VALUES('$id3','{$_SESSION['login']}','$ip_from2','chat','$multimedia_name','$multimedia_type','$multimedia_size','$multimedia_data',NOW(),'request$i2','request$i2','request$i2','$finger')";
       $result6=$conn->query($sql6);

         //  echo '<script type="text/javascript">alert("Your file has been sent successfully");
                 // </script>';
                      }
                     

                  else
                    {  
              // echo '<script type="text/javascript">alert("Error! Can not be sent file");
             // </script>';
                      }  
                               
                
                
            } 
            
                
       } // end of insert photo






   } // end of else data

  $conn->commit();

  $conn->close();
   


?>
