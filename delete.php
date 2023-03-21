<?php
include('connection.php');
$Edit_id=$_GET['delete_id'];
$sql="DELETE FROM `admin` WHERE id='$Edit_id'";
$qry=mysqli_query($con,$sql);
if($qry){
    echo "
                 <script>
                alert('You Want To Delete This Record');
                 window.location.href='admin.php';
                 </script>";
}else{
    echo "
                 <script>
                 alert('Please Try Again ');
                 window.location.href='admin.php';
                 </script>";
}
 ?>