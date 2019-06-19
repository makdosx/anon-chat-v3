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

body
{
/*    
background: url(/photos/1.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
*/
}






.form1
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
bottom: -2%;
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
bottom:1%;
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
bottom:1%;
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
top:1%;
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
top:1%;
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
top: 18%;
left: 38%;
margin-top: -50px;
margin-left: -100px;

border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:1em;
display: block;
height: 75%;
overflow-y: auto;
width: 100%;
text-align: center;
font-size: 16px;



}



#tr_mess
{
width: 100%;    
}



#td_mess
{
background-color:#F3635A;
border-style:solid;
border-width:0.3em; 
border-color:#F3635A;
border-radius: 25px;
width: 100%; 
}



#td_mess2
{
background-color:#D3CECE;
border-style:solid;
border-width:0.3em; 
border-color:#D3CECE;
border-radius: 25px;
width: 100%; 
}



#avatar1
{
height: 6%;
width: 4%;
border-radius: 50%;
}



#avatar2
{
object-fit: cover;
height: 40px;
width: 40px;
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

var refreshTime = 30000;

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



<!--
<script type="text/javascript">
if (location.href.indexOf('read')==-1)
{
   location.href=location.href+'?read';
}
</script>
-->


</head>



 <body>


<br><br>

   
  <a href="javascript:close_window();" id="close_tab"><img src="/photos/close.png" id="img_close" title="close conversation"></a>



  <script>
    function close_window() 
      {
     if (confirm("Do you want go back to messenger?"))
        {
    //close();
    window.history.back();
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

  $both = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);


    // prwto meros emfanish onomatos kai avatar


    $sql0 = "select _from,_to from chat where request_both = '$both' 
                     and message='request_conversation'";
    $result0 = $conn->query($sql0);

     
        while ($row0 =  $result0->fetch_assoc())
         {
          $_from = $row0['_from'];
          $_to   = $row0['_to'];

          $request_both1 = $_from ."_" .$_to;
          $request_both2 = $_to ."_" .$_from;   

          }


          if ($_from == $_SESSION['login'])
             {
                 
                $avatar_data_to = $_to ."." ."png";
                $avatar_to = "<img id='avatar1' src='/avatars/$avatar_data_to'>";
                 
           echo "<div id='conv_user'> 
                  $avatar_to $_to
                    <hr>
                </div>";
                }
                
             
          
         
         else if ($_from != $_SESSION['login'])
             {
              
                $avatar_data_from = $_from."."."png"; 
                $avatar_from = "<img id='avatar1' src='/avatars/$avatar_data_from'>";
                 
           echo "<div id='conv_user'> 
                  $avatar_from $_from
                    <hr>
                </div>";
                } 

   
  

 $sql="select * from chat where (request_both = '$request_both1' or request_both = '$request_both2')
 and message!='request_conversation' order by id desc";
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
                    <a href='chat2.php?both=$both'> Messenger </a>
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
          
         //avatar_data = $row['avatar'];
        // $avatar = '<img id="avatar2" src="data:image/jpeg;base64,'. base64_encode($avatar_data) .'"/>';
          
           $avatar_from = $from."."."png"; 
           $avatar = "<img id='avatar2' src='/avatars/$avatar_from'>";
 
          $to   =  $row['_to']; 
          
          $message = wordwrap($row['message'], 50, "<br>", true);
          
          
          // echo emoticons

              $emoticon = array(":)", ":D", ":(", ":'(", ":P", "O:)",
                                "3:)", "o.O", ";)", ":O", "-_-", ">:O",
                                ":*", "^_^", "8-)", "8|", ">:(", ":v",
                                ":/", ":3", "<3", "(y)", "(^^^)", ":|]",
                                ":poop:", ":putnam:", "like");

              $emoticons = array("1.png" => ":)", "2.png" => ":D", "3.png" => ":(",
                                 "4.png" => ":'(", "5.png" => ":P", "6.png" => "O:)",
                                 "7.png" => "3:)", "8.png" => "o.O", "9.png" => ";)",
                                 "10.png" => ":O", "11.png" => "-_-", "12.png" => ">:O", 
                                 "13.png" => ":*", "14.png" => "^_^", "15.png" => "8-)",
                                 "16.png" => "8|", "17.png" => ">:(", "18.png" => ":v",
                                 "19.png" => ":/", "20.png" => ":3", "21.png" => "<3",
                                 "22.png" => "(y)", "23.png" => "(^^^)", "24.png" => ":|]", 
                                 "25.png" => ":poop:", "26.png" => ":putnam:", "like.png" => "like");

            if (in_array($message, $emoticon)) 
                   {                 

                   $key = array_search($message, $emoticons); 
 
                   $message = "<img src='emoticons/$key' height='25' width='25'>";

                     }


         $mutimedia_name_0 = $row['multimedia_name'];
         $mutimedia_name = wordwrap($mutimedia_name_0, 50, "<br>", true);

         $multimedia_type = $row['multimedia_type'];
         
         $multimedia_size = $row['multimedia_size'];
        
         $multimedia_data = $row['multimedia_data'];
        
 
 
         $photo_data_view = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>"; 
         
        
        $audio_data_view = "<a href='view_audios.php?aud_id=$id&aud_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";


        $video_data_view = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";
                        

        $pdf_data_view = "<a href='view_pdfs.php?pdf_id=$id&pdf_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";

                   
       $text_data_view = "<a href='view_texts.php?txt_id=$id&txt_name=$mutimedia_name_0' target='_blank'>
                          <font color='white'> $mutimedia_name </font>
                        </a>";




        $photo_data_view2 = "<a href='view_pictures.php?pic_id=$id&pic_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>"; 
         

       $audio_data_view2 = "<a href='view_audios.php?aud_id=$id&aud_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>";


       $video_data_view2 = "<a href='view_videos.php?vid_id=$id&vid_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>";           
        
        $pdf_data_view2 = "<a href='view_pdfs.php?pdf_id=$id&pdf_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>";       

        $text_data_view2 = "<a href='view_texts.php?txt_id=$id&txt_name=$mutimedia_name_0' target='_blank'>
                          <font color='black'> $mutimedia_name </font>
                        </a>";
        



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
                


        if ($multimedia_type == "audio/mp3")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-volume-up'></span> &nbsp; $audio_data_view  <br> </b> </font> 
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
              

        if ($multimedia_type == "application/pdf")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-file'></span> &nbsp; $pdf_data_view  <br> </b> </font> 
              </td>";
                   }
                }


   if ($multimedia_type == "text/plain")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-text-size'></span> &nbsp; $text_data_view  <br> </b> </font> 
              </td>";
                   }
                }

     
             } // end session login == from
      





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
                
                 
      if ($multimedia_type == "audio/mp3")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='black'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-volume-up'></span> &nbsp; $audio_data_view2  <br> </b> </font> 
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


       if ($multimedia_type == "application/pdf")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='black'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-file'></span> &nbsp; $pdf_data_view2  <br> </b> </font> 
              </td>";
                   }
                }
              


     if ($multimedia_type == "text/plain")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <hr>  <span class='glyphicon glyphicon-text-size'></span> &nbsp; $text_data_view2  <br> </b> </font> 
              </td>";
                   }
                }

              
            } // end session login != from




        echo "<tr id ='tr_mess'> $mes </tr>";


            } // end of while chat

    echo '</table> </div> </div>';
          
         } // end of else echo





 echo  "<div align='center'>
         <form action='delete_chat_messages.php?both=$both' method='post'/>
                <input type='submit'  name='delete_submit' value='Delete Conversation &nbsp; &nbsp;' id='del'/> 
        </form>
         </div>";


       // echo "<div align='center'> <a href='chat3.php?both=$both'> Top </a> <div>";

   } // end of else data

  $conn->commit();

  $conn->close();
   


?>

