<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
  {
$contactno=$_POST['contactno'];
$username=$_POST['username'];
$password=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where  AdminuserName='$username' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $query1=mysqli_query($con,"update tbladmin set Password='$password'  where  AdminuserName='$username' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";
echo "<script>window.location.href='login.php'</script>";

   }
     
    }
    else{
    
      echo "<script>alert('Detalii invalide. Te rog incearca din nou.');</script>";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
<link href="removewatermarkeduard.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid 19 Testare | Logare Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Parola noua si confirmarea nu corespund');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
 <h3 align="center" style="margin-top:4%;color:#fff">Covid Testare</h3>
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
<form name="login" method="post" name="changepassword">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Recuperare parola</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" 
                                                id="username" placeholder="Introduceti numele de utilizator" required="true">
                                        </div>
                                        <div class="form-group">
                                <input type="text" name="contactno" placeholder="Numar de telefon" autocomplete="off" class="form-control">
                                        </div>
                                    <div class="form-group">
                                      <input type="password" name="newpassword" placeholder="Parola noua" autocomplete="off" class="form-control">
                                        </div>

                                            <div class="form-group">
                               <input type="password" name="confirmpassword" placeholder="Confirmare parola" autocomplete="off" class="form-control">
                                        </div>

                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php" style="font-weight:bold">Logare</a>
                                    </div>
                               <div class="text-center">
                                        <a class="small" href="index.php" style="font-weight:bold;"><i class="fa fa-home" aria-hidden="true"></i> Acasa</a>
                                    </div>
                                </div>
                            </div>
                        </div>

</form>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>