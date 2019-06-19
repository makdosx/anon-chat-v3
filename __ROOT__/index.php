<?php


/*
$file = '/var/www/anon-chat/photos/anon.png';
$newfile = '/var/www/anon-chat/avatars/mak_anon.png';
 
if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}else{
    echo "copied $file into $newfile\n";
}
*/


$default_dir =  dirname(__FILE__);
$main_dir  = $default_dir = substr($default_dir, 0, -8);

echo $main_dir;

?>

