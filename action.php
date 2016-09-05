<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];

if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", 
strtolower($email))) 
 
 { 
 
  echo 
"<center>Поверніться <a 
href='javascript:history.back(1)'><B>назад</B></a>. Ви вказали невірну електронну адресу! 
"; 
 
  } 

  else
  {

echo "<p>$name</p>
<p>$email</p>
<p>$phone</p>
<p>$message</p>";
}