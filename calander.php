<html>
<head>
<title>Home page of WUGCVS</title>
<link href="good.css" rel="stylesheet" type="text/css" />
</head>
<body id="contianer">
<div id="bod">
<div>
<?php
		include "yheader.php";
		?>
</div>                    
<div id="left">
<?php
		include "yleft.php";
		?>	
</div>
<div id="cent">
<div id="img">
<SCRIPT LANGUAGE="JavaScript" >
var timee;
function stopClock(){
clearTimeout(timee);
}
function yourClock(){
var nd = new Date();
var h, m, s;
var time=" ";
h = nd.getHours();
m = nd.getMinutes();
s = nd.getSeconds();
if (s <=9) s="0" + s;
if (m <=9) m="0" + m;
if (h <=9) h="0" + h;
time+=h+":"+m+":"+s;
document.the_clock.the_time.value=time;
timee=setTimeout("yourClock()",1000);
}
</SCRIPT>
</head>
<body bgcolor="#7aa" onLoad="yourClock()", onUnload="stopClock(); return true"> 
<form name="the_clock">
<input type="text" name="the_time" size="36" style="padding-bottom:10px;">
</form>
<script LANGUAGE="JavaScript">
monthnames = new Array("January","Februrary","March","April","May","June","July","August","September","October","November","Decemeber");
var linkcount=0;
function addlink(month, day, href) {
var entry = new Array(3);
entry[0] = month;
entry[1] = day;
entry[2] = href;
this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;
linkdays = new Array();
monthdays = new Array(12);
monthdays[0]=31;
monthdays[1]=28;
monthdays[2]=31;
monthdays[3]=30;
monthdays[4]=31;
monthdays[5]=30;
monthdays[6]=31;
monthdays[7]=31;
monthdays[8]=30;
monthdays[9]=31;
monthdays[10]=30;
monthdays[11]=31;
todayDate=new Date();
thisday=todayDate.getDay();
thismonth=todayDate.getMonth();
thisdate=todayDate.getDate();
thisyear=todayDate.getYear();
thisyear = thisyear % 100;
thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
if (((thisyear % 4 == 0) 
&& !(thisyear % 100 == 0))
||(thisyear % 400 == 0)) monthdays[1]++;
startspaces=thisdate;
while (startspaces > 7) startspaces-=7;
startspaces = thisday - startspaces + 1;
if (startspaces < 0) startspaces+=7;
document.write("<table border=0 bgcolor=#66CCFF width=240 height=210");
document.write("bordercolor=black><font color=black>");
document.write("<tr><td colspan=7><center><strong>" 
+ monthnames[thismonth] + " " + thisyear 
+ "</strong></center></font></td></tr>");
document.write("<tr>");
document.write("<td align=center>Su </td>");
document.write("<td align=center>M</td>");
document.write("<td align=center>Tu</td>");
document.write("<td align=center>W</td>");
document.write("<td align=center>Th</td>");
document.write("<td align=center>F</td>");
document.write("<td align=center>Sa</td>"); 
document.write("</tr>");
document.write("<tr>");
for (s=0;s<startspaces;s++) {
document.write("<td> </td>");
}
count=1;
while (count <= monthdays[thismonth]) {
for (b = startspaces;b<7;b++) {
linktrue=false;
document.write("<td>");
for (c=0;c<linkdays.length;c++) {
if (linkdays[c] != null) {
if ((linkdays[c][0]==thismonth + 1) && (linkdays[c][1]==count)) {
document.write("<a href=\"" + linkdays[c][2] + "\">");
linktrue=true;
      }
   }
}
if (count==thisdate) {
document.write("<font color='FF0000'><strong>");
}
if (count <= monthdays[thismonth]) {
document.write(count);
}
else {
document.write(" ");
}
if (count==thisdate) {
document.write("</strong></font>");
}
if (linktrue)
document.write("</a>");
document.write("</td>");
count++;
}
document.write("</tr>");
document.write("<tr>");
startspaces=0;
}
document.write("</table></p>");
</script>
</div>
</div>
<div id="righ">
<?php
		include "yright.php";
		?>
		<?php 
if (isset($_POST['Login']))
			
			{
session_start();
$UserName=$_POST['uname'];
$Password=$_POST['pword'];
$UserType=$_POST['selectop'];
if($UserType==="--select one--")
{
?>
<div class="alert alert-error">
			  	 Please select your account type
				 and try again!!!
				</div>
<?php 
}
else
{
if($UserType==="Administrator")
{
$con = mysqli_connect("localhost","root") or die(mysqli_error($con));
mysqli_select_db($con, "gcvs_db_success") or die("Can not select Database");
$sql = "select * from user where username='".$UserName."' and password='".$Password."' and  User_type='".$UserType."'";
$result = mysqli_query($con, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
?>
<div class="alert alert-error">
			  	 Please check your User Name,Password and select ur account type
				 and try again!!!
				</div>

<?php 
}
else
{
session_start();
$_SESSION['username']=$row['username'];
header("location:AdminPage.php");
} 
mysqli_close($con);
}
else if($UserType==="Registerar")
{
$con = mysqli_connect("localhost","root") or die(mysqli_error($con));
mysqli_select_db($con, "gcvs_db_success") or die("Can not select Database");
$sql = "select * from user where username='".$UserName."' and password='".$Password."' and  User_type='".$UserType."'";
$result = mysqli_query($con, $sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
?>
<div class="alert alert-error">
			  	 Please check your User Name, Password and Select Your account type
				 and try again!
				</div>

<?php 
}
else
{
session_start();
$_SESSION['username']=$row['username'];
header("location:RegisterarPage.php");
} 
mysqli_close($con);
}
}
}
?>

</div>
<?php
		include "yfoot.php";
		?>
</div>
</body>
</html>
