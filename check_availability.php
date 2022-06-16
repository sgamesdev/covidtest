<?php 
require_once("includes/config.php");
// Check Availabilty for user mobile number
if(!empty($_POST["mobnumber"])) {
	$mnumber= $_POST["mobnumber"];

		$result =mysqli_query($con,"select id from tblpatients where MobileNumber='$mnumber'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> MNumarul de telefon deja exista. Va rog introduceti alt numar sau apasati <a href='registered-user-testing.php'>Utilizatori inregistrati</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Numar de telefon valabil .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


// Check Availabilty for Phlebotomist employee id
if(!empty($_POST["employeeid"])) {
	$empid= $_POST["employeeid"];

		$result =mysqli_query($con,"select id from tblphlebotomist where EmpID='$empid'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Angajatul deja exista. Va rog introduceti alt angajat.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Nume valabil .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
