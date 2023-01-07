<?php 
 $server = "127.0.0.1:8111" ;
 $username = "root";
 $password = "" ;
 $dbname = "notes";

    $conn =  mysqli_connect($server,$username,$password,$dbname) ;
    if(!$conn) {
        die (" connection to this data base failed due to ". mysqli_connect_error());
    
    }
    else  {
    echo "  sucessfully connected "; 
    }
    if($_SERVER["REQUEST_METHOD"]== "POST") {
        $title =$_POST["title"] ;
        $Description =$_POST["Description"] ;
        $sql="INSERT INTO `mynotes` (`SrNo`, `title`, `description`, `Action`) VALUES (NULL, '$title', '$Description', 'eidt delete ')";
        // $sql = "INSERT INTO `mynotes` (`SrNo`, `title`, `description`, `Action`) VALUES (NULL, .$title . $Description. '')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo " record has been updated " ;
        }  
    //   exit();
    }
    
    ?>
    <!-- INSERT INTO `mynotes` (`SrNo`, `title`, `description`, `Action`) VALUES (NULL, 'LEARN PHP crud ', 'Need to get done with the php crud opeartion !', ''); -->
    <!DOCTYPE html>
<html>
    <head>
        <title>
            HOME Page 
       
        </title>
        
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
        <style>
            body { /* background-color: powderblue; */
                /* background-image: href=; */
                font-family:Arial, Helvetica, sans-serif; 
                font-size: 25px;
            }
            h1 {color: rgb(255, 0, 0);
                text-align:center;}
            p {color: blue;}
               
          </style>
          <link rel="canonical" href="the url of the second pad that have the same content "
          <meta name="robots " content="index , nofollow">
    </head>
    <body>
        <form action="/newphp/" method="POST">
            <label id="title">title :
            <input type="text" name=" title" required></label> <br> <br> 
            <label id="Description">Description :
            <input type="text" name="Description"></label>
            <input type="submit">
        </form>
       
    <table>
            <tr>
               <th>SR no .</th>
               <th>Title</th>
               <th>Description</th>
               <th>Action</th>
            </tr>
        <?php
        $sql = "SELECT * FROM mynotes";
        $result = mysqli_query($conn,$sql);
        // $data= array();
         $n =0 ;
            while($row = mysqli_fetch_array($result)){
                $n=$n+1 ;
                // $data = $row;
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
             echo "
             <tr>
             <td>".  $n. "</td> 
               <td>".  $row["title"]. "</td>
               <td>". $row["description"]. "</td>
               <td>". $row["Action"]. "</td>
             </tr>" ;
                }
            
                mysqli_close($conn);

                if(!$conn) { echo "db closed "; }
                else { echo "bd runninf" ;}
            //  $conn->close();
             ?>
