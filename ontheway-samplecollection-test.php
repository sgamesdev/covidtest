<?php session_start();
//conexiune baza de date
include_once('includes/config.php');
//error_reporting(0);
//validare sesiune
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid | Teste Atribuite </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="removewatermarkeduard.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
  <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Atribuit flebotomistului</h1>
    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Teste atribuite</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="assignto" method="post">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Nr.ordine</th>
                                            <th>Nume pacient</th>
                                            <th>Nr.tlf.</th>
                                            <th>Tip test</th>
                                            <th>Data colectarii</th>
                                            <th>Data inrg.</th>
                                            <th>Actiune</th>
                                        </tr>
                                    </thead>
                                      <tfoot>
                                            <tr>
                                            <th>Nr.</th>
                                            <th>Nr.ordine</th>
                                            <th>Nume pacient</th>
                                            <th>Nr.tlf.</th>
                                            <th>Tip test</th>
                                            <th>Data colectarii</th>
                                            <th>Data inrg.</th>
                                            <th>Actiune</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select tbltestrecord.OrderNumber,tblpatients.FullName,tblpatients.MobileNumber,tbltestrecord.TestType,tbltestrecord.TestTimeSlot,tbltestrecord.RegistrationDate,tbltestrecord.id as testid from tbltestrecord
join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
where ReportStatus='On the Way for Collection'
    ");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['OrderNumber'];?></td>
                                            <td><?php echo $row['FullName'];?></td>
                                            <td><?php echo $row['MobileNumber'];?></td>
                                            <td><?php echo $row['TestType'];?></td>
                                            <td><?php echo $row['TestTimeSlot'];?></td>
                                             <td><?php echo $row['RegistrationDate'];?></td>
                                            <td>

                                <a href="test-details.php?tid=<?php echo $row['testid'];?>&&oid=<?php echo $row['OrderNumber'];?>" class="btn btn-info btn-sm">Vezi detalii</a> 

                            </td>
                                        </tr>
<?php $cnt++;} ?>
                                    </tbody>
                                </table>
                                     </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
    <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php');?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
<?php } ?>