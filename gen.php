<?php

$file = '/tmp/some.file.name.html';

/*
  $_GET['lastname'] is your "Link to image Page"

  please change the `name` to something more appropriate

  <input type="text" name="lastname" value="Image Page">
*/

if(isset($_GET['lastname'])){

  $string_to_write = '
    <div class="item">
        <a href="'.$_GET['lastname'].'">
      <img src="'.$_GET['firstname'].'" height="268"/></a>
    </div>
  ';

  // if our file doesn't exist, then create it
  if (!file_exists($file))
    if(!touch($file))
      trigger_error('ERROR: could not create file on disk', E_USER_ERROR);

  // Write the contents to the file, 
  // using the FILE_APPEND flag to append the content to the end of the file
  // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
  if (!file_put_contents($file, $string_to_write, FILE_APPEND | LOCK_EX))
    trigger_error('ERROR: could not write to file on disk', E_USER_ERROR);

  // redirect to wherever
  header('Location: /');

}

// print the file to screen
include($file);

?>

Add Your Image:
<form>
  Raw Image File:
  <input type="text" name="firstname" value="Raw Image">
  <br>Link to image Page:
  <input type="text" name="lastname" value="Image Page">
  <br>
  <input type="submit" value="Submit">
</form>