<?php
include("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMRERCIAL WEBSITES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">
            <marquee behavior="" direction="" class="text-info"> HERE IS ECOMRERCIAL WEBSITES DEMO OF ADD TO CART REAL
                TIME</marquee>
        </h1>
        <!-- <h4 class="cart-text text-center">
            <form action="my-cart.php" method="post">
                <button class="btn btn-outline-success">My Cart(0)</button>
            </form>
        </h4> -->
    </div>
    <?php
$sql="SELECT * FROM `admin`";
$data=mysqli_query($con, $sql);
$result=mysqli_num_rows($data);
if ($result !=0) {
    ?>
    <?php
        while ($row=mysqli_fetch_assoc($data)) {
            ?>
    <div class="container  align-items-center">
    <form action="cart-detail.php" method="post">
        <div class="row  align-items-center border border-dark ">
            <div class="col-sm-3">
            <?php echo "<img src='".$row['pro_file']."' height='200px' width='200px'>"; ?>
            </div>
            
            <div class="col-sm-6  align-items-center">
                <div class="row  ">
                    <div class="col-sm-12">
                      <strong class="text-muted">Product Description:</strong>  <?php echo $row['pro_desc'] ?>
                    </div>
                    <div class="col-sm-12">
                    <strong class="text-muted">Product Name:</strong>    <?php echo $row['pro_name'] ?>
                    </div>

                    <div class="col-sm-12">
                    <strong class="text-muted">Product  Price:</strong>    <?php echo $row['pro_price'] ?>
                    </div>
                    <div class="col-sm-12">
                        <input type="number" min="1"  name="qty" max="100" placeholder="Qty">
                    </div>
                    <div class="col-sm-12">
                    <strong class="text-muted">Rate:<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i> </strong>   
                    </div>
                    
                    <div class="col-sm-12">
                        <a href="cart-detail.php?pro_id=<?php echo $row['id']; ?>" name="Add_to_Cart" class="btn btn-sm btn-primary">Add to Cart</a>
                        <input type="submit" name="Buy_Now" value="Buy Now" class="btn btn-sm btn-primary">
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>

    <?php
        }
}
?>

</body>

</html>