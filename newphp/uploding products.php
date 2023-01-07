<?php 
$server = "127.0.0.1:8111";
$username = "root";
$password = "";
$database = "sneakerhead" ;

$conn = mysqli_connect($server,$username,$password,$database) ;
if ($conn) {
    echo "Connected success" ;
 }
 else {
     echo " not connected";
 }
//( `name`, `description`, `price`, `category_id`, `quantity`, `image`) 
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pname = $_POST['fullname'] ;
    $pdesc = $_POST['description'] ;
    $pprice = $_POST['Price'] ;
    $pquantity = $_POST['quantity'] ;
    $pcategory = $_POST['Category'] ;
    $image = $_FILES['images']['name'];
    $imgtempname = $_FILES['images']['tmp_name'];
    $targetpath ="Sneakerhead/upload/".$image;
    if(move_uploaded_file($imgtempname,$targetpath)){
        $imgsql ="INSERT INTO `products` ( `name`, `description`, `price`, `category_id`, `quantity`, `image`) VALUES ( '$pname', '$pdesc', '$pprice', '$pcategory', '$pquantity', '$image');" ;
        $imgresult = mysqli_query($conn,$imgsql) ;
        if($imgresult){
            echo "<br>product added successfully";
            
            }
        else {
            echo "product not added error while uploding " ;
        }
    }
    $sql= "SELECT * FROM `products`;";
            $result = mysqli_query($conn,$sql) ;
            $row = mysqli_fetch_assoc($result);
                echo '<img src="Sneakerhead/upload/'.$row['image'].'">';
                echo"<br>"; 
                echo $row['image'];
    
        
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Uploading products on the Database.css">
        <title>Uploading products on the Database  </title>
    </head>
    <body>
         <!-- NAVBAR -->
        <div id="heading" >
            <div id="logo">
                <h1 id="logohead"> Uploading products on the Database</h1>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&display=swap" rel="stylesheet">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            </div>
        </div>

        

        <div class="container">
           <div class="intro-text">
               <h2>Upload Products </h2>
               <p>Already have an account ? <a href = "#" > Login!</a></p>
           </div>
           <form action="uploding products.php" method="post" enctype="multipart/form-data">
            <label for="pname"> PRODUCT NAME: </label>
               <input type="text" name="fullname" placeholder="Product Name"  id="pname" required/> <br>
            <label for="pdesc"> PRODUCT DESCRIPTION: </label>
               <input type="text" name="description" placeholder="Product Description" id="pdesc"required/> <br>
            <label for="pprice"> PRODUCT PRICE: </label>
               <input type="number" name="Price" placeholder="Product Price" id="pprice"required/> <br>
            <label for="pquantity"> PRODUCT QUANTITY: </label>
               <input type="number" name="quantity" placeholder="Product Quantity"id="pquantity" required/> <br>
            <label for="pquantity"> PRODUCT CATEGORY : </label>
               <input type="number" name="Category" placeholder="Product Category"id="pcategory" required/> <br>
            <label for="pimg"> PRODUCT IMAGE: </label>
               <input type="file" name="images" placeholder="Product Image"id="pimg" required/> <br> 
            
               
               <div class="check-box">
                   <input type="checkbox" id="check"/>
                   <label for="check"> I have read and agree to the 
                       <a href="#">To upload the product to the database  </a>
                   </label>
               </div>
               <button type="submit" name="submit">Upload product </button>
           </form>
        </div>

</html>
