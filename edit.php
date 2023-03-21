<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include("connection.php");

$Edit_id=$_GET['edit_id'];
?>
<table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ITEM NAME</th>
                        <th scope="col">ITEM PRICE</th>
                        <th scope="col">ITEM DESCRIPTION</th>
                        <th scope="col">PRODUCT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

<?php
$sql="SELECT * FROM `admin` WHERE id='$Edit_id'";
$data=mysqli_query($con,$sql);
$result=mysqli_num_rows($data);
if($result !=0){ 
while ($row=mysqli_fetch_assoc($data)) {
   ?>

<tbody>
    <tr>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <td> <input type="text" name="edit_id" value="<?php echo $row['id'] ?>"> </td>
        <td><input type="text" name="edit_name" value="<?php echo $row['pro_name'] ?>"></td>
        <td><input type="text" name="edit_price" value="<?php echo $row['pro_price'] ?>"></td>
        <td><input type="text" name="edit_desc" value="<?php echo $row['pro_desc'] ?>"></td>
        <td>
            <?php echo "<img src='".$row['pro_file']."' height='100' width='100'>";?>
            <input type="file" name="edit_file" >
        </td>
        <td><input type="submit" name="update" value="Update Product" class="btn btn-sm btn-primary"></td>
        </form>
    </tr>
</tbody>
<?php       
  }
}
?>

<?php

if (isset($_POST['update'])) {
                            $pro_id=  mysqli_real_escape_string($con, $_POST['edit_id']);
                            $pro_name=  mysqli_real_escape_string($con, $_POST['edit_name']);
                            $pro_price=  mysqli_real_escape_string($con, $_POST['edit_price']);
                            $pro_des=  mysqli_real_escape_string($con, $_POST['edit_desc']);
                            if (isset($_POST['update'])) {
                                if (isset($_FILES['edit_file'])) {
                                    $file_name=$_FILES['edit_file']['name'];
                                    $temp_name=$_FILES['edit_file']['tmp_name'];
                                    $folder="./images/".$file_name;
                                    move_uploaded_file($temp_name, $folder);
                                    header('location:admin.php');
                                }
                            }
                            $sql="UPDATE `admin` SET `id`='$pro_id',`pro_name`='$pro_name',`pro_price`='$pro_price',`pro_desc`='$pro_des',`pro_file`='$folder' WHERE id='$Edit_id'";
                            $qry=mysqli_query($con, $sql);
                        }
                        ?>

</table>

