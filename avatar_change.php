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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>

 /* For id document */
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 113px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 10%;
    font-size: 10px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
#img-upload
{
height: 40%;
width:  41.5%;
}
</style>




<script>
$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>







<script type = 'text/javascript' >
function changeHashOnLoad() 
{
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}
 
function changeHashAgain()
 {
  window.location.href += '1';
}
 
var storedHash = window.location.hash;
window.setInterval(function () 
{
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 



<head>



<body id="body" oncontextmenu="return false;">

        <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                      <h2 align="center">
                       <font color="black"> <b> Change Your Avatar </b> </font> 
                      </h2>
                </div>
                <div class="login-form" style="width:350px; position: relative; left: 28%;">
                    <form action="" method="post" enctype="multipart/form-data">

                          <hr>

                         


                      <div class="container">
                        <div class="col-md-12">
                          <div class="form-group">

   
                      <div class="form-inline"> 
                        <span class="btn btn-default btn-file glyphicon glyphicon-picture col-sm-2">
                         Browse… <input type="file" name="avatar" id="imgInp" required>
                       </span>
                        
                        <span class="btn btn-danger btn-file glyphicon glyphicon-cog col-sm-1">
                        <input type="file" readonly>
                       </span>

    <span class="group-btn">  &nbsp; &nbsp; &nbsp; &nbsp;
          <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 col-sm-2" > 
                  Set Avatar <i class="glyphicon glyphicon-ok-circle"></i>
               </button>
                 </span>

                   </div>
                    <br><br>
                 <img id='img-upload'/> <br>

               </div>

   

              </div>
            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




</body>
</html>



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

        if (isset($_POST['submit']))
             {
                 
             $username = $_SESSION['login'];     

        $avatar_name  =  $_FILES['avatar']['name'];
        $avatar_type  =  $_FILES['avatar']['type'];
        $avatar_size  =  $_FILES['avatar']['size'];
        $avatar_data  =  addslashes(file_get_contents($_FILES ['avatar']['tmp_name']));
        $allowed_imgs = array( "image/pjpeg","image/jpeg","image/jpg","image/png","image/x-png","image/gif");

      // if (empty($_FILES['identity_front']['tmp_name']))
         //  {
        //  echo '<script type="text/javascript">alert("This field is required");
         //   </script>';
        // echo ("<script>location.href='page-register4.php'</script>"); 
         //  }
    
     if (!in_array($avatar_type, $allowed_imgs)) 
         {
          echo '<script type="text/javascript">alert("This file not image");
            </script>';
          echo ("<script>location.href='avatar_change.php'</script>"); 
         }


       else
         {
 
           // Check for errors
         if($_FILES['file_upload']['error'] > 0)
          {
          die('<div align="center"> An error ocurred when uploading. </div>');
           }


          if(!getimagesize($_FILES['avatar']['tmp_name'])){
              die('<div align="center"> Please ensure you are uploading an image. </div>');
             }
            
             
            // Check filetype
             if($_FILES['avatar']['type'] != 'image/png') 
                 {
                die('<div align="center"> Unsupported filetype uploaded (Only png images). </div>');
                 }


            // Check filesize
             if($_FILES['avatar']['size'] > 1500000)
               {
              die('<div align="center"> File uploaded exceeds maximum upload size. </div>');
               }
               

            // Check if the file exists
              if(file_exists('upload/' . $_FILES['avatar']['name']))
                 {
               die('<div align="center"> File with that name already exists. </div>');
                 }
                 

           // Upload file
           if(!move_uploaded_file($_FILES['avatar']['tmp_name'], 'avatars/' . "$username.png"))
              {
                echo '<script type="text/javascript">alert("Avatar was not set! Try again");
                      </script>';
                echo ("<script>location.href='avatar_change.php'</script>"); 
                }

            else
             {
               echo '<script type="text/javascript">alert("Avatar was successfully set");
                </script>';
               echo ("<script>document.location.reload(true);document.location='chat.php'</script>"); 
             }
             



/*
        if (move_uploaded_file($avatar_data, $uploadfile)) 
         {
       echo '<script type="text/javascript">alert("Avatar was successfully set");
                </script>';
               echo ("<script>location.href='chat.php'</script>"); 
          }
          
          
        else 
         {
         echo '<script type="text/javascript">alert("Avatar was not set! Try again");
              </script>';
          echo ("<script>location.href='avatar_change.php'</script>"); 
            }
*/




         }


       } // end of isset submit 


     } // end else of connect

 $conn->close();


 } // end of session login


?>

