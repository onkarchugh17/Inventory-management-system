<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php include('sidebar.php');?>
<div class="container">
    <div class="row">
        <h1 class="text-center">
            Add Product
        </h1>
        <div class="container ">
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
                <tbody>

                    <tr>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" autocomplete="off">
                               <td>1</td>
                            <td><input type="text" name="product_name" placeholder="Product Name"></td>
                            <td><input type="number" name="product_price" placeholder="Product Price"></td>
                            <td><textarea name="pro_des" id="" cols="30" rows="1"
                                    placeholder=" Product Description "></textarea></td>
                            <td><input type="file" name="product_file"></td>
                            <td><input type="submit" name="add_product" class="btn btn-sm btn-primary"
                                    value="Add Product"></td>

                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<body>
</body>

</html>

<?php
include("./connection.php");

                        if (isset($_POST['add_product'])) {
                            $pro_name=  mysqli_real_escape_string($con, $_POST['product_name']);
                            $pro_price=  mysqli_real_escape_string($con, $_POST['product_price']);
                            $pro_des=  mysqli_real_escape_string($con, $_POST['pro_des']);
                            if (isset($_POST['add_product'])) {
                                if (isset($_FILES['product_file'])) {
                                    $file_name=$_FILES['product_file']['name'];
                                    $temp_name=$_FILES['product_file']['tmp_name'];
                                    $folder="./images/".$file_name;
                                    move_uploaded_file($temp_name, $folder);

                                    header('location:admin.php');
                                }
                            }
                            $sql="INSERT INTO `admin`(`pro_name`, `pro_price`, `pro_desc`, `pro_file`) VALUES ('$pro_name','$pro_price','$pro_des','$folder')";
                            $qry=mysqli_query($con, $sql);
                        }
                        ?>

<?php 
$sql="SELECT * FROM `admin`";
$data=mysqli_query($con,$sql);
$result=mysqli_num_rows($data);
if($result !=0){ 
?>
<div class="container text-white">
    <div class="row border border-white bg-primary">
        <div class="col-sm-1"><h5>ID</h5> </div>
        <div class="col-sm-2"><h5>ITEM NAME</h5></div>
        <div class="col-sm-2"><h5>ITEM PRICE</h5></div>
        <div class="col-sm-3"><h5>ITEM DESCRIPTION</h5></div>
        <div class="col-sm-2"><h5>PRODUCT</h5></div>
        <div class="col-sm-2"><h5>ACTION</h5></div>
    </div>
</div>

<?php
    while($row=mysqli_fetch_assoc($data)){
?>

<div class="container text-white text-capitalize">
    <div class="row border align-items-center border-info bg-dark">
        <div class="col-sm-1">
            <?php echo $row['id'] ?>
        </div>
        <div class="col-sm-2">
            <?php echo $row['pro_name'] ?>
        </div>
        <div class="col-sm-2">
            <?php echo $row['pro_price'] ?>
        </div>
        <div class="col-sm-3">
            <?php echo $row['pro_desc'] ?>
        </div>
        <div class="col-sm-2">
            <?php echo "<img src='".$row['pro_file']."' height='100' width='100'>";?>
        </div>
        <div class="col-sm-2">
             <a href="edit.php?edit_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
             <a href="delete.php?delete_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
        </div>
    </div>
</div>


<?php
    }
}
?>