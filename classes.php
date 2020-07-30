<?php
/*
 * Copyright (c) 2017-2018 Barchampas Gerasimos <makindosx@gmail.com>
 * QR-sms is a sms getaway with qrcode for verification (etc).
 *
 * QR-sms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * QR-sms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
  class data
    {
    public $connect = array();
    public function __construct()
        {
         $this->connect[0]="localhost";
         $this->connect[1]="ixxtlntj_anbs";
         $this->connect[2]="perla1!Aaa";
         $this->connect[3]="ixxtlntj_anbs";
           }
      } // end of coonect class
  
   class security extends data
       { 
        public $connect = array();
        public function __construct()
           {
         $this->connect[0]="localhost";
         $this->connect[1]="ixxtlntj_anbs";
         $this->connect[2]="perla1!Aaa";
         $this->connect[3]="ixxtlntj_anbs";
         } // end of class extends of connect with parent and child
         }
          
 
     
       class safe_data 
        {
  
          public function input($data)
           {
            $data = stripslashes($data);
            $data = trim($data);
            return ($data);  
            } 
          } // end of class for dafe data
          
 
?>

