<?php include_once("Connections/con1.php"); 
header("Pragma: no-cache");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>image regs</title>
</head>
<?php
if(isset($_REQUEST["ss2"])==false)
{
$c10p=$_REQUEST["t2"];
$c10b=$_REQUEST["t3"];
$c10s=$_REQUEST["t4"];
$c10y=$_REQUEST["t5"];
$c10r=$_REQUEST["t6"];
$c12p=$_REQUEST["t7"];
$c12b=$_REQUEST["t8"];
$c12s=$_REQUEST["t9"];
$c12y=$_REQUEST["t10"];
$c12r=$_REQUEST["t11"];
$h=$_REQUEST["k5"];
$b=$_REQUEST["k4"];
$d=$_REQUEST["k3"];
$st=$_REQUEST["l1"];
$fl=$_REQUEST["l2"];
$aad=$_REQUEST["t1"];
$con2=new mysqli("localhost","root","","college_admission") or die("Error");
$aa=$con2->query("select aadhar from ppinfo");
while($ad=$aa->fetch_assoc());
$c2=mysqli_query($con1,"insert into einfo values('".$c10r."',".$c10p.",'".$c10s."','".$c10b."','".$c12r."',".$c12p.",'".$c12s."','".$c12b."','".$c10y."','".$c12y."','".$d."','".$st."','".$h."','".$b."','".$fl."','KIT".$aad."','KIT".$aad."' )");}
?>
<body style="background-image:url(image/books_vintage_paper_cards_notebook_retro_74362_1280x1024.jpg); background-size:cover; background-repeat:no-repeat; opacity:0.9">
<div style="background-color:#09F; height:100px; font-family:'Comic Sans MS', cursive; font-size:60px; text-align:center; color:#FFF"><img src="image/logo.png" width="125" height="100"  align="left" />KOLKATA INSTITUTE OF TECHNOLOGY</div>
<br/>
<?php
$k=0;
if(isset($_REQUEST["ss2"])==true)
{
	$type1=$_FILES["i1"]["type"];
	$size1=$_FILES["i1"]["size"];
	$type2=$_FILES["i2"]["type"];
	$size2=$_FILES["i2"]["size"];
	$aad=$_REQUEST["j1"];
	//$c12r=$_REQUEST["j1"];
	if(($type1=='image/jpeg') && ($type2=='image/jpeg') && $size1/1024<=60 && $size2/1024<=30)
	{
		$img1=$_FILES['i1']['tmp_name'];
		$img2=$_FILES['i2']['tmp_name'];
		if(is_uploaded_file($_FILES['i1']['tmp_name']) && is_uploaded_file($_FILES['i2']['tmp_name']))
		{
			$tmp1=addslashes(file_get_contents($_FILES['i1']['tmp_name']));
			$tmp2=addslashes(file_get_contents($_FILES['i2']['tmp_name']));
			mysqli_query($con1,"insert into imagesign values('KIT".$aad."','KIT".$aad."','".$tmp1."','".$tmp2."')");
			move_uploaded_file($_FILES['i1']['tmp_name'],"images/10001.jpg");
			move_uploaded_file($_FILES['i2']['tmp_name'],"images/100011.jpg");
			$id2=$aad+1;
			$ccc2=mysqli_query($con1,"update id set id=".$id2." where info=0");
			$k=1;
		}
		
	}
	else
		echo '<script>alert("Enter specified size or type")</script>';
}
?>
<script>
function f1()
{
	var input=document.getElementById('ii1');
	var fReader = new FileReader();
	fReader.readAsDataURL(input.files[0]);
	fReader.onloadend = function(event){
		var img = document.getElementById('disp');
		img.src = event.target.result;
	}
}
function k1()
{
	var input=document.getElementById('ii2');
	var fReader = new FileReader();
	fReader.readAsDataURL(input.files[0]);
	fReader.onloadend = function(event){
		var img = document.getElementById('disp1');
		img.src = event.target.result;
	}
}
</script>
<div style="width:1000px; color:#FF0000; background-color:#434343; margin-left:10%; text-align:center; font-size:36px"><h1>Image and Signature Upload</h1></div>
<form method="post" action="" enctype="multipart/form-data">
<?php echo "<input type='hidden' name='j1' value='".$aad."'/>" ?>
<?php echo "<input type='hidden' name='j2' value='".$aad."'/>" ?>
<table width="874" height="283" border="1" style="background-color:#000;margin-left:17%; margin-top:10%;">
  <tr>
    <td width="144" style="font-size:14px; color:#FFF; font-size:18px">Upload Your Image (Max 60kb)</td>
    <td width="223"><input type="file" style="color:#FFF" onchange="f1()" name="i1" id="ii1" /></td>
  	<td id="inner1" width="154"><img src="" height="80px" id="disp"/></td>
  </tr>
  <tr>
    <td width="144" style="font-size:14px; color:#FFF; font-size:18px">Upload Your Signature (Max 30kb)</td>
    <td><input type="file" style="color:#FFF" onchange="k1()" name="i2" id="ii2"/></td>
    <td width="154"><img src="" height="80px" id="disp1"/></td>
  </tr>
</table>
<br/>
<br/>
<input type="submit" value="Submit" style="background-color:#FFF; font-size:36px; margin-left:45%;" name="ss2"/>
</form>
<script>
function ll()
	{
	window.history.forward();
	}
	setTimeout("ll()",0);
	window.onunload= function () {null};

</script>
<?php
if($k==1)
{
	echo '<script>alert("Thank you for registering...\nRegistration done on '.date("d/m/Y").'")</script>';
	echo '<a href="test.php" ><input type="button" value="End Registration" style="font-size:26px; color:#39065; background-color:#95151624;margin-left:43%; width:150"/></a>';
include_once("Connections/con1.php");
include_once 'fpdf.php';

$p=new FPDF();
$p->AddPage("P","A4");
$p->SetFont("Arial","B","20");
$conn=new mysqli("localhost","root","","college_admission") or die("Error");
$pd=$conn->query("select * from ppinfo where id='KIT".$aad."'");
$pd1=$conn->query("select * from imagesign where id='KIT".$aad."'");
$s=$pd->fetch_assoc();
$s1=$pd->fetch_assoc();
$pd2=$conn->query("select * from einfo where id='KIT".$aad."'");
$s2=$pd2->fetch_assoc();
$k=$s['name'];
$p->Cell(0,10,"KOLKATA INSTITUTE OF TECHNOLOGY",1,1,"C");
$p->Image("image/logo.png",9,5,20,20);
$p->Image("image/logo.png",181,5,20,20);
$p->Image("images/10001.jpg",90,35,30,30);
$p->SetRightMargin(190);
$p->ln();
$p->ln();
$p->ln();
$p->ln();
$p->ln();


$x=80+$p->GetX();
$y=$p->GetY();
$p->SetFont("Arial","B","12");
$p->SetXY(30,$y);
$p->Cell(60,10,"Name",1,1,"C");
$p->SetXY($x,$y);
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+10);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Registration I'd:",1,1,"C");
$p->SetXY($x,$y+10);
$k=$s['id'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+20);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Gender:",1,1,"C");
$p->SetXY($x,$y+20);
$k=$s['gender'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+30);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Blood Group:",1,1,"C");
$p->SetXY($x,$y+30);
$k=$s['bloodgroup'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+40);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Mobile Number:",1,1,"C");
$p->SetXY($x,$y+40);
$k=$s['mobile'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+50);
$p->SetFont("Arial","B","12");
$p->Cell(60,20,"",1,1,"C");
$p->SetXY(30,$y+53);
$p->MultiCell(60,5,"Address","","C");
$p->SetXY($x,$y+50);
$k=$s['address'];
$p->SetFont("Arial","","10");
$p->Cell(100,20,"",1);
$p->SetXY($x,$y+53);
$p->MultiCell(100,5,"$k","","C");
$p->SetXY(30,$y+70);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Guardian's Name:",1,1,"C");
$p->SetXY($x,$y+70);
$k=$s['guardianname'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+80);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Guardian's Mobile Number:",1,1,"C");
$p->SetXY($x,$y+80);
$k=$s['gphonenumber'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+90);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"E-mail:",1,1,"C");
$p->SetXY($x,$y+90);
$k=$s['email'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+100);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Category:",1,1,"C");
$p->SetXY($x,$y+100);
$k=$s['category'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+110);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"P.W.D. Status:",1,1,"C");
$p->SetXY($x,$y+110);
$k=$s['pwd'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");

$p->SetXY(30,$y+120);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Degree:",1,1,"C");
$p->SetXY($x,$y+120);
$k=$s2['degree'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+130);
$p->SetFont("Arial","B","12");
$p->Cell(60,10,"Stream:",1,1,"C");
$p->SetXY($x,$y+130);
$k=$s2['stream'];
$p->SetFont("Arial","","10");
$p->Cell(100,10,"$k",1,1,"C");
$p->SetXY(30,$y+140);
$p->SetFont("Arial","B","12");
$p->Cell(60,20,"Signature of student:",1,1,"C");
$p->SetXY($x,$y+140);;
$p->Image("images/100011.jpg",$x+25,$y+143,50,13);
$p->Cell(100,20,"",1,1,"C");
$p->ln();
$p->ln();
$p->Image("image/sign.jpg",$x+51,$y+170,50,13);
$y=$p->GetY();
$p->SetXY(136,$y-20);
$p->SetFont("Arial","U","13");
$p->Cell(60,20,"Signature of Chancellor",0,1,"C");
$p->Addpage("p" , "A4");
$p->SetFont('Arial', 'B', 25);

$p->Cell(190, 10, "KOLKATA INSTITUTE OF TECHNOLOGY", 1,2,"C");
$p->SetFont('Arial', 'BU', 20);
$p->Cell(10, 50, "Guidelines for College Admission:-",0,1,'L');
$p->SetMargins(10,50,190);
$p->Rect(10,60,190,150);
$p->SetFont('Arial', 'B', 16);
$p->MultiCell(190, 10, "1. Candidates must score 60% and above in the prerequisite\n\t\t\t\texamination. ");
$p->MultiCell(190,10, "2. The Candidate must carry the hardcopy of their registration form\n\t\t\t\talong with the  photocopies of the mentioned documents.");
$p->MultiCell(190, 10, "i.Voter Card, Aadhar Card or driving license  for photo identification.");
$p->MultiCell(190, 10, "ii.Class 10 marksheet for birth date verification .");
$p->MultiCell(190, 10, "iii.Class 12 marksheet for marks verification .");
$p->MultiCell(190, 10, "iv.Caste Certificate (if any).");
$p->MultiCell(190, 10, "v. PWD Certificate (if any).");
$p->MultiCell(190, 10, "3. The Candidate must carry the original documents for further\n\t\t\t\tverification. ");
$p->MultiCell(190, 10, "4. All the photocopies must be self-attested."); 
$p->MultiCell(190, 10, "5. Payment  should  be made either by Payorder or in demand draft. ");
ob_clean();
$p->Output();
	
}
?>
<br/>
<br/>
</body>
</html>