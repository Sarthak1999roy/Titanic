<?php include_once ("Connections/con1.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edu regs</title>
<script>
function f()
{
	var v1=document.getElementById('op1');
	var v2=document.getElementById('op2');
	var i=0;
	if(v1.value=="BBA" || v1.value=="BCA")
	{
		for(i=1;i<v2.length;i++)
			v2.options[i].disabled=true;
		v2.options[0].selected=true;
		v2.options[0].disabled=false;
	}
	else
	{
		for(i=1;i<v2.length;i++)
			v2.options[i].disabled=false;
		v2.options[1].selected=true;
		v2.options[0].disabled=true;
	}
}
</script>
<?php
$nm=$_REQUEST["t1"];
$adrnm=$_REQUEST["t2"];
$dob=$_REQUEST["t3"];
$adrs=$_REQUEST["t4"];
$mnm=$_REQUEST["t5"];
$rsnm=$_REQUEST["t6"];
$bldgrp=$_REQUEST["t7"];
$eml=$_REQUEST["t8"];
$fnm=$_REQUEST["t9"];
$focc=$_REQUEST["t10"];
$fphn=$_REQUEST["t11"];
$gnm=$_REQUEST["t12"];
$gocc=$_REQUEST["t13"];
$gphn=$_REQUEST["t14"];
$ct=$_REQUEST["k1"];
$pwd=$_REQUEST["k2"];
if(strlen($gnm)===0)
$gnm=' ';
if(strlen($gocc)===0)
$gocc=' ';
if(strlen($gphn)===0)
$gphn=' ';
$gender=$_REQUEST['g1'];
$con22=new mysqli("localhost","root","","college_admission") or die("Error");
$kf=$con22->query("select id from id");
$id=$kf->fetch_assoc();
$id1=$id["id"];
$con22->query("delete from ppinfo where id='KIT".$id1."'");
$ki=$con22->query("select id from ppinfo where id='KIT".$id1."'");
//$id2=$id1+1;
$c1=mysqli_query($con1,"insert into ppinfo values('KIT".$id1."','".$nm."','".$adrnm."','".$dob."','".$gender."','".$adrs."','".$mnm."','".$rsnm."','".$bldgrp."','".$fnm."','".$focc."','".$fphn."','".$gnm."','".$gocc."','".$gphn."','".$eml."','".$ct."','".$pwd."' )");
//$c2=mysqli_query($con1,"update id set id=".$id2." where info=0");
?>
</head>
<?php
$con=new mysqli("localhost","root","","college_admission") or die("Error");
$c=$con->query("select flng from yn");
$d=$con->query("select stream from yn");
$e=$con->query("select degree from yn");
$en=$con->query("select yno from yn");
$ef=$con->query("select yno from yn");
?>
<script>
function llll()
{
	var v1=document.getElementById('op2');
	v2.options[1].selected=true;
}
</script>
<body style="background-image:url(image/books_vintage_paper_cards_notebook_retro_74362_1280x1024.jpg); background-size:cover; background-repeat:no-repeat; opacity:0.9" onload="f()">
<div style="background-color:#09F; height:100px; font-family:'Comic Sans MS', cursive; font-size:60px; text-align:center; color:#FFF"><img src="image/logo.png" width="125" height="100"  align="left" />KOLKATA INSTITUTE OF TECHNOLOGY</div>
<br/>
<div style="width:1000px; color:#FF0000; background-color:#434343; margin-left:10%; text-align:center; font-size:50px"><h1>Educational Details</h1></div>
<form method="post" action="imagesign.php">
<?php echo "<input type='hidden' name='t1' value='".$id1."'/>" ?>
<table width="1209" height="569" border="1" style="background-color:#600; margin-left:5%; color:#FFFFFF">
  <tr>
    <td>Enter Class 10 Percentage</td>
    <td><label for="t2"></label>
      <input type="number" step="0.01" min="60.00" max="100.00" name="t2" id="t2" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 10 Board</td>
    <td><label for="t3"></label>
      <input type="text" style="width:800px" name="t3" id="t3" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 10 School</td>
    <td><label for="t4"></label>
      <input type="text" name="t4" id="t4" style="width:800px" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 10 Passout Year</td>
    <td><label for="t5"></label>
      <input type="number" name="t5" id="t5" required="true" max="2017" min="2012"/></td>
  </tr>
  <tr>
    <td>Enter Class 10 Roll Number</td>
    <td><label for="t6"></label>
      <input type="text" style="width:800px" name="t6" id="t6" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 12 Percentage</td>
    <td><label for="t7"></label>
      <input type="number" step="0.01" min="60.00" max="100.00" name="t7" id="t7" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 12 Board</td>
    <td><label for="t8"></label>
      <input type="text" name="t8" id="t8" style="width:800px" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 12 School</td>
    <td><label for="t9"></label>
      <input type="text" name="t9" id="t9" style="width:800px" required="true"/></td>
  </tr>
  <tr>
    <td>Enter Class 12 Passout Year</td>
    <td><label for="t10"></label>
      <input type="number" name="t10" id="t10" required="true" max="2019" min="2014"/></td>
  </tr>
  <tr>
    <td>Enter Class 12 Roll Number</td>
    <td><label for="t11"></label>
      <input type="" name="t11" style="width:800px" id="t11" required="true"/></td>
  </tr>
  <tr>
    <td>Do you want to Hostel Facility</td>
    <td>
       <select name="k5" style="width:100px; height:30px"><?php
  while($s=$en->fetch_assoc())
  {
	  if(strlen($s["yno"])!=0)
  		echo "<option>",$s["yno"]."</option>";
  }
  ?></select></td>
  </tr>
  <tr>
    <td>DO you want to avail Bus Facility</td>
    <td>
      <select name="k4" style="width:100px; height:30px"><?php
  while($s=$ef->fetch_assoc())
  {
	  	if(strlen($s["yno"])!=0)
  		echo "<option>".$s["yno"]."</option>";
  }
  ?></select></td>
  </tr>
  <tr>
    <td>Enter Degree</td>
    <td>
      <select name="k3" style="width:100px; height:30px" onchange="f()" id="op1"><?php
  while($s=$e->fetch_assoc())
  {
	  	if(strlen($s["degree"])!=0)
  		echo "<option>".$s["degree"]."</option>";
  }
  ?></select></td>
  </tr>
  <tr>
    <td height="35">Enter the Stream</td>
    <td><select name="l1" id="op2" style="width:100px; height:30px">
    <option>Not Applicable</option>
    <option>CSE</option>
    <option>IT</option>
    <option>ECE</option>
    <option>ME</option>
    <option>BT</option>
    <option>EEE</option>
    <option>EE</option>
    <option>CIVIL</option>
  </select></td>
  </tr>
  <tr>
  <td height="35">Foreign Language</td>
  <td><select name="l2" style="width:100px; height:30px"><?php
  while($s=$c->fetch_assoc())
  {
		if(strlen($s["flng"])!=0)
  		echo "<option>".$s["flng"]."</option>";
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
<br/><br/>
<input type="submit" value="Submit" onclick="ll()" style="background-color:#333; color:#FFF; font-size:26px; width:200px; height:50px; margin-left:40%; margin-right:50%;" name="ss1" />
</form>
</body>
</html>