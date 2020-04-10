<?php include_once ("Connections/con1.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body style="background-image:url(image/books_vintage_paper_cards_notebook_retro_74362_1280x1024.jpg); background-size:cover; background-repeat:no-repeat; opacity:0.9">
<div style="background-color:#09F; height:100px; font-family:'Comic Sans MS', cursive; font-size:60px; text-align:center; color:#FFF"><img src="image/logo.png" width="125" height="100"  align="left" />KOLKATA INSTITUTE OF TECHNOLOGY</div>
<br/>
<?php
$con=new mysqli("localhost","root","","college_admission") or die("Error");
$c=$con->query("select yno from yn");
$d=$con->query("select cat from yn");

$en=$con->query("select yno from yn");
$kf=$con->query("select id from id");
$id=$kf->fetch_assoc();
if($id['id']>=11200)
{
	header("location:close.php");
}
?>
<div style="width:1000px; color:#FF0000; background-color:#434343; margin-left:10%; text-align:center; font-size:50px"><h1>Personal Details</h1>
<?php
echo '<p style="text-align:right; font-size:36px">Date: '.date("d/m/Y").'</p>';
?>
</div>
<script>
function upper1()
{
	var p=document.getElementById("t1");
	var d=p.value;
	p.value=d.toUpperCase();
	var p1=document.getElementById("t12");
	var d1=p1.value;
	p1.value=d1.toUpperCase();
	var p2=document.getElementById("t9");
	var d2=p2.value;
	p2.value=d2.toUpperCase();
}
function length1()
{
	var p=document.getElementById("t2");
	var c=p.value;
	if(c.length!=12)
	{
		alert("Wrong Aadhar Number");
		document.getElementById('s1').disabled=true;
	}
	else
	{
		for(var i=0;i<12;i++)
		{
			if(c.charAt(i)<'0' || c.charAt(i)>'9')
			{
				document.getElementById('s1').disabled=true;
				alert("Wrong Aadhar Number");
			}
			else
			document.getElementById('s1').disabled=false;
		}
		
	}
}
function length2()
{
	var p=document.getElementById("t14");
	var c=p.value;
	if(c.length!=10)
	{
		alert("Wrong Mobile Number");
		document.getElementById('s1').disabled=true;
	}
	else
	{
		for(var i=0;i<10;i++)
		{
			if(c.charAt(i)<'0' || c.charAt(i)>'9')
			{
				document.getElementById('s1').disabled=true;
				alert("Wrong Mobile Number");
			}
			else
			document.getElementById('s1').disabled=false;
		}
	}
}
function length3()
{
	var p=document.getElementById("t5");
	var c=p.value;
	if(c.length!=10)
	{
		alert("Wrong Mobile Number");
		document.getElementById('s1').disabled=true;
	}
	else
	{
		for(var i=0;i<10;i++)
		{
			if(c.charAt(i)<'0' || c.charAt(i)>'9')
			{
				document.getElementById('s1').disabled=true;
				alert("Wrong Mobile Number");
			}
			else
			document.getElementById('s1').disabled=false;
		}
	}
}
</script>
<form method="post" action="educational info.php">
<table width="1209" height="569" border="1" style="background-color:#600; margin-left:5%; font-size:22px">
  <tr>
    <td width="349" style="color:#FFF">Enter your name</td>
    <td width="844"><label for="t1"></label>
      <input type="text" name="t1" id="t1" style="width:800px" required="true" onblur="upper1()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your Aadhar number</td>
    <td><label for="t2"></label>
      <input type="text" name="t2" id="t2" style="width:800px" required="true" onblur="length1()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your date of birth</td>
    <td><label for="t3"></label>
      <input type="date" name="t3" id="t3" required="true" min="1995-01-01" max="2002-12-31" /></td>
  </tr>
  <tr>
  	<td style="color:#FFF">Enter your gender</td>
    <td style="color:#0FF"><input type="radio" name="g1" value="Male" required="true"/>Male &nbsp;&nbsp; <input type="radio" name="g1" value="Female"/ required="true">Female &nbsp;&nbsp; <input type="radio" name="g1" value="Other" required="true"/>Other &nbsp;&nbsp;</td>
   </tr>
  <tr>
    <td style="color:#FFF">Enter your full address</td>
    <td><label for="t4"></label>
      <input type="text" name="t4" id="t4" style="width:800px" required="true"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your mobile number (Without Country Code)</td>
    <td><label for="t5"></label>
      <input type="text" name="t5" id="t5" required="true"  onblur="length3()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your residential number</td>
    <td><label for="t6"></label>
      <input type="text" name="t6" id="t6" required="true"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your blood group</td>
    <td><label for="t7"></label>
      <input type="text" name="t7" id="t7" required="true"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your email</td>
    <td><label for="t8"></label>
      <input type="email" name="t8" id="t8" style="width:800px" required="true"/></td>
  </tr>
    <tr>
    <td style="color:#FFF">Enter your guardian's name</td>
    <td><label for="t12"></label>
      <input type="text" name="t12" id="t12" style="width:800px" required="true" onblur="upper1()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your guardian's occupation</td>
    <td><label for="t13"></label>
      <input type="text" name="t13" id="t13" style="width:800px" required="true"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your guardian's phone number (Without Country Code)</td>
    <td><label for="t14"></label>
      <input type="text" name="t14" id="t14" required="true" onblur="length2()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your father's name</td>
    <td><label for="t9"></label>
      <input type="text" name="t9" id="t9" style="width:800px" onblur="upper1()"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your father's occupation</td>
    <td><label for="t10"></label>
      <input type="text" name="t10" id="t10" style="width:800px"/></td>
  </tr>
  <tr>
    <td style="color:#FFF">Enter your father's phone number</td>
    <td><label for="t11"></label>
      <input type="" name="t11" id="t11"/></td>
  </tr>
  <tr>
    <td  style="color:#FFF" height="35">Select your category</td>
    <td><select name="k1" style="width:100px; height:30px"><?php
  while($s=$d->fetch_assoc())
  {
		if(strlen($s["cat"])!=0)
  		echo "<option>".$s["cat"]."</option>";
  }
  ?>
  </select></td>
  </tr>
  <tr>
  <td height="35" style="color:#FFF">Select your pwd status</td>
  <td><select name="k2" style="width:100px; height:30px"><?php
   while($s=$c->fetch_assoc())
  {
		if(strlen($s["yno"])!=0)
  		echo "<option>".$s["yno"]."</option>";
  }
  ?>
  </select>
  </td>
  </tr>
</table>
<script>
function ll()
	{
	window.history.forward();
	}
	setTimeout("ll()",0);
	window.onunload= function () {null};

</script>
<br/>
<br/>
<input type="submit" name="s1" id="s1" onclick="ll()" value="Submit" style="background-color:#333; color:#FFF; width:150px; height:50px; margin-left:40%; margin-right:50%; font-size:24px;"/>
</form>
</body>
</html>