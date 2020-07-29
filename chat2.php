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


	<script src="js/recorder.js"></script>
        <script src="js/Fr.voice.js"></script>
        <script src="js/jquery.js"></script>
	<script src="js/app.js"></script>
        


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
height:70px;
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
border-style:none;

outline:none;

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
top:1%;
left:5%;
height:100%;
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
height:100%;
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


#footer2
{
position: fixed;
right: 1%;
bottom: 1%;
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
height: 65%;
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
border-radius: 10px;
width: 100%; 
}



#td_mess2
{
background-color:#F1F0F0;
border-style:solid;
border-width:0.3em; 
border-color:#F1F0F0;
border-radius: 10px;
width: 100%; 
}



#avatar1
{
height: 8%;
width: 5%;
border-radius: 50%;
}



#avatar2
{
object-fit: cover;
height: 30px;
width: 30px;
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


.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}


.progress-bar {
    width: calc(100% - 6px);
    height:20px;
    background: #e0e0e0;
    padding: 3px;
    border-radius: 3px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, .2);
}

.progress-bar-fill {
    display: block;
    height: 20px;
    background: #659cef;
    border-radius: 3px;
    /*transition: width 250ms ease-in-out;*/
    transition: width 5s ease-in-out;
}



#controls {
  display: flex;
  margin-top: 2rem;
}


.button_audio {
  height:40px;
  width: 80px;
  border: none;
  border-radius: 1em;
  background: #ed341d;
  margin-left: 2px;
  box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2);
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  color:#ffffff;
  font-weight: bold;
  font-size: 1rem;
}


.button_audio:hover, .button_audio:focus {
  outline: none;
  background: #c72d1c;
}


.button_audio::-moz-focus-inner {
  border: 0;
}


.button_audio:active {
  box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.2);
  line-height: 5px;
}


.button_audio:disabled {
  pointer-events: none;
  background: lightgray;
}

.button_audio:first-child {
  margin-left: 0;
}


.audio {
  display: block;
  width: 100%;
  margin-top: 0.2rem;
}


li {
  list-style: none;
  margin-bottom: 1rem;
}


#formats {
  margin-top: 0.5rem;
  font-size: 80%;
}





/* modal image */

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}



#delete_one
{
height:15px;
width: 15px;
float: right; 
filter: gray; /* IE5+ */
-webkit-filter: grayscale(100); /* Webkit Nightlies & Chrome Canary */
-webkit-transition: all ease-in-out;  
}


#delete_one:hover
{
float: right; 
filter: none;
-webkit-filter: grayscale(0);
-webkit-transform: scale(1.01);
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
        document.getElementById("txt_1").value = getSavedValue("txt_1");    // set the value to this input
       // document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>




<script type="text/javascript">


var time = new Date().getTime();


var refreshTime = 1000;

$(document).bind("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error hover change", function (e) {
    time = new Date().getTime();
});

function refresh() {
    if (new Date().getTime() - time >= refreshTime) 
    {
   $("#reload").load("#reload1");

    } 
    
    
    else {
        setTimeout(refresh, refreshTime);
    }
    
    
}

setTimeout(refresh, refreshTime);


</script>







</head>

</head>

<br><br>

<body>
    
    
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

  $both = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);

  $finger = $_SESSION['fingerprint'];

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

          $both_to = $_to;

          }
   

        $request_both1_1 = explode("_", $request_both1, 2);
        $request_both1_1 = $request_both1_1[0];

        $request_both2_2 = explode("_", $request_both2, 2);
        $request_both2_2 = $request_both2_2[0];

       // echo $request_both1 ."<br>" .$request_both2 ."<br>";

      //  echo $request_both1_1 ."<br>" .$request_both2_2;


     
         // authentication for conversations
          if ($request_both1_1 == $_SESSION['login'] or $request_both2_2 == $_SESSION['login'])            
               {


       $_SESSION['both'] = $both;



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
 



/*

 $sql_id="select id from chat where (request_both = '$request_both1' or request_both = '$request_both2')
          and message!='request_conversation' order by id desc";
 $result_id=$conn->query($sql_id);
  $row_id = $result_id->fetch_assoc();
      $last_id = $row_id['id'];
      //echo $last_id; 
  */
  

 $sql="select * from chat where (request_both = '$request_both1' or request_both = '$request_both2') 
and message!='request_conversation' order by id desc ";
 $result=$conn->query($sql);

        
        
      
             echo '<div id="reload">
                   <div id="reload1">
                   <table class="table4">';
 
     
  //$sql2="select photo_data from profile 
    //     inner join chat on profile.username = chat._from
      //   where chat._from='".$_SESSION['login']."'";

  
            echo "<td id='td_default_mess'>
                    <a href='chat_lite.php?both=$both'> Messenger Lite </>
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
          
          //$user_avatar = $_SESSION['login'];

         //avatar_data = $row['avatar'];
        // $avatar = '<img id="avatar2" src="data:image/jpeg;base64,'. base64_encode($avatar_data) .'"/>';
          
           $avatar_user = $from."."."png"; 
           $avatar = "<img id='avatar2' src='/avatars/$avatar_user'>";
 
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
                                 "19.png" => ":/", "20.png" => "<3", "21.png" => "<3",
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
        
        
          $delete_one = "<form action='' method='post' style='float:right;'>
                          <button type='submit' name='delete_one' value='$id' 
                           style='background:none!important; border:none; padding:0!important; font-family:arial,sans-serif; color:#069; text-decoration:underline; cursor:pointer;'>
                          <img src='photos/delete2.png' id='delete_one'>
                          </button>
                        </form> ";



             if ($row['_from'] == $_SESSION['login'])
                {
                    
              if  ($message != null)
                   { 
                    $mes = "<td id='td_mess'>
                    <font color='white'>  $avatar $date $time $delete_one <br> 
                       $message </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one  <br>  <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view </b> </font> 
              </td>";
                   }
                }
                


        if ($multimedia_type == "audio/mp3")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one <br>  <span class='glyphicon glyphicon-volume-up'></span> &nbsp; $audio_data_view </b> </font> 
              </td>";
                   }
                }
                 
            

         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one <br> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view </b> </font> 
              </td>";  
                }
               }
              

        if ($multimedia_type == "application/pdf")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one <br>  <span class='glyphicon glyphicon-file'></span> &nbsp; $pdf_data_view </b> </font> 
              </td>";
                   }
                }


   if ($multimedia_type == "text/plain")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one  <br>  <span class='glyphicon glyphicon-text-size'></span> &nbsp; $text_data_view </b> </font> 
              </td>";
                   }
                }

     
             } // end session login == from
      





        if ($row['_from'] != $_SESSION['login'])
                {
                    
              if  ($message != null)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time $delete_one <br>  $message </b> </font> 
              </td>";
                 }
                
                
            if ($multimedia_type == "image/jpeg" or $multimedia_type == "image/jpg" or $multimedia_type == "image/png" or $multimedia_type == "image/gif")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time $delete_one  <br> <span class='glyphicon glyphicon-picture'></span> &nbsp; $photo_data_view2 </b> </font> 
              </td>";
                   }
                }
                
                 
      if ($multimedia_type == "audio/mp3")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='black'> $avatar $date $time $delete_one  <br>  <span class='glyphicon glyphicon-volume-up'></span> &nbsp; $audio_data_view2 </b> </font> 
              </td>";
                   }
                }


            
         if ($multimedia_type == "video/mp4")
               {
            if  ($multimedia_size > 0)
               {
         $mes = "<td id='td_mess2'>
         <font color='black'> $avatar $date $time $delete_one  <br> <span class='glyphicon glyphicon-facetime-video'></span> &nbsp; $video_data_view2 </b> </font> 
              </td>";  
                }
               }


       if ($multimedia_type == "application/pdf")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='black'> $avatar $date $time $delete_one <br>  <span class='glyphicon glyphicon-file'></span> &nbsp; $pdf_data_view2 </b> </font> 
              </td>";
                   }
                }
              


     if ($multimedia_type == "text/plain")
              {
             if  ($multimedia_size > 0)
                   { 
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time $delete_one <br>  <span class='glyphicon glyphicon-text-size'></span> &nbsp; $text_data_view2 </b> </font> 
              </td>";
                   }
                }

              
            } // end session login != from




        echo "<tr id ='tr_mess'> $mes </tr>";


            } // end of while chat

    echo '</table> </div> </div>';
          




 echo  "<div align='center'>
         <form action='delete_chat_messages.php?both=$both' method='post'/>
                <input type='submit'  name='delete_submit' value='Delete Conversation &nbsp; &nbsp;' id='del'/> 
        </form>
         </div>";



echo'
 <div align="center">
  <form action="" method="POST" class="form1" autocomplete="off">
      <br><br>
   <input class="chat" name="chat_text" maxlength="512" autofocus="autofocus" id="txt_1" required>
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

    </div>


<div id="footer2">

<img id="myImg" src="emoticons/emoticons.png" alt="Snow" style="width:100%;max-width:200px">

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

</div>';



/*

<script>
$("#txt_1").keypress(function (e) {
    if(e.which == 13 && !e.shiftKey) {        
        $(this).closest("form").submit();
        e.preventDefault();
        return false;
    }
});
</script>

      <a class="button recordButton" id="record">Record</a>
      <a class="button disabled one" id="pause">Pause</a>
      <a class="button disabled one" id="save">Ready</a>
      <a class="button disabled one" href="upload2.php">Send</a>
   
		<style>
		.button{
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
			padding: 5px 12px;
			cursor: pointer;
			outline: none;
			font-size: 13px;
			text-decoration: none !important;
			text-align: center;
			color:#fff;
			background-color: #4D90FE;
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
			background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			border: 1px solid #4787ED;
			box-shadow: 0 1px 3px #BFBFBF;
		}
		a.button{
			color: #fff;
		}
		.button:hover{
			box-shadow: inset 0px 1px 1px #8C8C8C;
		}
		.button.disabled{
			box-shadow:none;
			opacity:0.7;
		}
    canvas{
      display: block;
    }
		</style>

</div>';

*/




  if (isset($_POST['delete_one']))
     {
         
        $id_delete = $_POST['delete_one']; 
         
        $sql="DELETE FROM chat WHERE id='$id_delete' and message !='request_conversation'";
        $result=$conn->query($sql);
             
     }




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
  

   $both_from = $_SESSION['login'];
   $both = $both_from."_".$both_to;
   

 $sql2="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
         VALUES ('$id2', '{$_SESSION['login']}','$ip_from','chat','$chat_text',NOW(),'request$i','$both','request$i','$finger')";
  $result2=$conn->query($sql2);


       if ($result2)
              {    


        $sql3="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
         VALUES ('$id2', '{$_SESSION['login']}','$ip_from','chat','$chat_text',NOW(),'request$i','$both','request$i','$finger')";
  $result3=$conn->query($sql3);

          
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
  
 $both_from = $_SESSION['login'];
   $both = $both_from."_".$both_to;

  $sql5="INSERT INTO chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint)  
         VALUES('$id3','{$_SESSION['login']}','$ip_from2','chat','$multimedia_name','$multimedia_type','$multimedia_size','$multimedia_data',NOW(),'request$i2','$both','request$i2','$finger')";
  $result5=$conn->query($sql5);



       if ($result5)
              {    


  $sql6="INSERT INTO backup_chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint)  
         VALUES('$id3','{$_SESSION['login']}','$ip_from2','chat','$multimedia_name','$multimedia_type','$multimedia_size','$multimedia_data',NOW(),'request$i2','$both','request$i2','$finger')";
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
      

     } // end of authentication of conversastions

 


    else
      {

      echo "<div align='center' style='background-color:; color:#1F59D9; height:90%; width:100%;'> 
                  
              <h2> <b> Error 404 </b> </h2>

             <h2> <b> You do not have access to this conversation !!! </b> </h2>
 
               <br><br><br>

              <img src='photos/linux.png' height='40%' width='20%'>

         <div class='footer'>
    
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
           <div class='progress-bar'>
           <span class='progress-bar-fill' style='width: 1%'></span>
          </div>

         <script>
           $('.progress-bar-fill').delay(1000).queue(function () {
           $(this).css('width', '100%')
          });
        </script>   

         </div>          

            </div>";

      exit;
       }
 


   } // end of else data

  $conn->commit();

  $conn->close();


?>
