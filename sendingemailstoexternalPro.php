<?php
$to=$_POST['cemail'];
$mes=$_POST['mes'];
$subject="Hello";
$from="project2015gc@gmail.com";
$header="From:$from";
if(mail($to,$subject,$mes,$header))
{
echo "mail sent seccessfully";
}
else
{
echo "mail is not sent";
}
?>