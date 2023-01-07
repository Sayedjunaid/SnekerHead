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
if(isset($_POST['submit'])){
    $name = $_POST['fullname'] ;
    $imgname = $_FILES['images']['name'];
    $tempname = $_FILES['images']['tmp_name'];
    $targetpath = "upload/".$imgname ;
   
    if(move_uploaded_file($tempname,$targetpath)){
        $imgsql = "INSERT INTO `upload_images` ( `name`, `images`) VALUES ( '$name ', '$imgname')";
        $imgresult = mysqli_query($conn,$imgsql);
        if($imgresult){
            echo "uploded success";}
            
    else{ echo"not uploaded";}
    
     }
            $sql="SELECT * FROM `upload_images`";
            $result = mysqli_query($conn,$sql);
            while( $row = mysqli_fetch_array($result) ) {
                echo '<img src="upload/'.$row['images'].'">'; }

                
    
} 
$sqla="SELECT * FROM `products`";
$resulta = mysqli_query($conn,$sqla);
while( $rowa = mysqli_fetch_array($resulta) ) {
    echo $rowa['image'] ; echo"<br>";echo $row['description'];echo"<br>"; }

?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="Uploading products on the Database.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>Uploading Images on the Database  </title>
    </head>
    <style>
         form input{
            width: 550px;
            display: block;
            height: 50px;
            border: 1px solid gray;
        }
        .flex {
            display: inline-flex ;
            flex-direction: row;
            align-content: space-between;
            border:1px solid black ;
        }
        .shw {
            border:1px solid black ;
        }
    </style>
    <body>
    
    <h1 style="text-align:center; font-size:30px "> upload images </h1>

    <form action="upload images .php" method="post" enctype="multipart/form-data" >
        <label for="pname"> PRODUCT NAME: </label>
        <input type="text" name="fullname" placeholder="Product Name"  id="pname" /> <br>
        <label for="pimg"> PRODUCT IMAGE: </label>
        <input type="file" name="images" placeholder="Product Image"id="pimg" /> <br> 
        <button type="=submit" name="submit">Upload product </button>
    </form>
  
    
            
           
    
        </div>
    </body>