




<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- font awesom css -->
<link rel="stylesheet" href="../css/all.min.css">


<!-- cutom   -->
<link rel="stylesheet" href="../css/custom.css">
</head>
<body>




<nav class="navbar navbar-expand-sm navbar-dark bg-danger ps-5 
fixed-top">
<a href="admindashboard.php" class="navbar-brand">OSMS</a></nav>


<!-- start container-fluid -->



<div class="container-fluid" style="margin-top:40px;">
<div class="row">
    <nav class="col-sm-2 bg-light sidebar py-5">
        <div class="sidebar-sticky">
            <ul class="nav flex-column edit">
<li class="nav-item">
    <a class="nav-link " href="admindashboard.php"> 
    <i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
<li class="nav-item"><a class="nav-link  " href="workorder.php"> <i class="fab fa-accessible-icon"></i>Work Order</a></li>
<li class="nav-item"><a class="nav-link " href="requests.php"> <i class="fas fa-align-center"></i>Requests</a></li>
<li class="nav-item"><a class="nav-link " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link active" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->


    <div class="col-sm-9 col-md-10 mt-5 text-center">
        <form action="" method="POST" class="d-print-none">
            <div class="form-row">
<div class="form-group col-md-2">
    <input type="date" class="form-control" name="startdate" id="">
</div> <span> to </span>
<div class="form-group col-md-2">
    <input type="date" name="enddate" class="form-control" id="">
</div>

<div class="form-group">
    <input type="submit" value="Search" name="searchsubmit" class="btn btn-secondary">
</div>

            </div>
        </form>
   



    <?php   
    
    if(isset($_REQUEST['searchsubmit'])){
        $startdate=$_REQUEST['startdate'];
        $enddate=$_REQUEST['enddate'];
        $sql="select *from customer_tb where cpdate between '$startdate' AND '$enddate'";
        $result=$conn->query($sql);
        if($result->num_rows >0){
            echo '<p class="bg-dark text-white p-2 mt-4">Details </p>';
            echo '<table class="table">';
 echo'<tr>';
 echo  '<th scope="col">Customer Id </th>';
 echo  '<th scope="col">Customer Name </th>';
 echo  '<th scope="col">Address </th>';
 echo  '<th scope="col">Product Name </th>';
 echo  '<th scope="col">Quantity </th>';
 echo  '<th scope="col">Price Each</th>';
 echo  '<th scope="col">Total </th>';
 echo  '<th scope="col">Date</th>';
 echo '</tr>';

while($row=$result->fetch_assoc()){
    echo '<tr>';
    echo '<td>' .$row['custid'].   '</td>';
    echo '<td>' .$row['custname'].   '</td>';
    echo '<td>' .$row['custadd'].   '</td>';
    echo '<td>' .$row['cpname'].   '</td>';
    echo '<td>' .$row['cpquantity'].   '</td>';
    echo '<td>' .$row['cpeach'].   '</td>';
    echo '<td>' .$row['cptotal'].   '</td>';
    echo '<td>' .$row['cpdate'].   '</td>';

    echo '</tr>';
}
echo '<tr>';
echo '<td>';
echo '<input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">';
echo '</td>';
echo '</tr>';



            echo '</table>';
        }else{
            echo 'Not Record Found';
        }
    }
    




    ?>
 </div>

    

    <!-- jquery files -->
    <script src="../js/jquery.min.js"></script>
<!-- popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- boot js -->
    <script src="../js/jquery.min.js"></script>
    <!-- font awesome js -->
     <script src="../js/all.min.js"></script>
</body>
</html>