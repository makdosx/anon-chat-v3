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


 $uname = strtolower(php_uname());

  if (strpos($uname, "darwin") !== false) 
    {
    // echo "Operating system: Macintosh";
     } 


 else if (strpos($uname, "win") !== false) 
    {
   // echo "Operating system: Windows";
    }


 else if (strpos($uname, "linux") !== false) 
  {
   // echo "Operating system: Gnu/Linux";
   } 


 else if (strpos($uname, "android") !== false) 
  {
   header('Location:operating_system_error.php');
   } 


  else
    {
     header('Location:operating_system_error.php');
     }





   // android
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
        header('Location: https://play.google.com/store/apps/details?id=YOUR_BUNDLE_ID');
        exit();
    }

    // ipad
    $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
    // iphone/ipod
    if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
    {
        header('Location: https://itunes.apple.com/YOUR_LINKG_TO_APPLE_STORE');
        exit();
    }
   // header('Location: http://www.default.com');





/*
if (DIRECTORY_SEPARATOR == '/') 
  {
    echo "linux";
   }

  if (DIRECTORY_SEPARATOR == '\\') 
  {
    echo "windows";
    }


*/


?>
