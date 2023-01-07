<!--  NOTE  : DO CHANGE THE EAMIL DB RECORD TO 'UNIQUE' BY EMPTYING THE RECORD TO MAKE SURE NO EMAL BE DUPLICATED   -->

<?php 
$server = "127.0.0.1:8111" ;
$username = "root" ;
$password = "" ;
$dbname = "sneakerhead" ;
$existemail = false ;
    // creating a connection with database 
$conn = mysqli_connect($server,$username,$password,$dbname) ;
if ($conn){
    // echo "Connected sucessfully  !!<br>";

}
else {
    echo "Connection failed due to --> " . mysqli_connect_error();
}
    // creating a variable of the input 
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $fullname = $_POST["fullname"] ;
    $user_email = $_POST["email"] ;
    $password = $_POST["password"] ;
    
    $exitsql = "SELECT * FROM `sing_up_user` WHERE email= '$user_email' ";
    $result1 = mysqli_query($conn ,$exitsql) ;
    // echo "<br>" . mysqli_num_rows($result1) . "<br>" ; // Checkimg the number of records of the email 
    if (mysqli_num_rows($result1) > 0) {
       
        $existemail = true ;
    }
    else {
        // creating a sql query 
    $sql = "INSERT INTO `sing_up_user` ( `fullname`, `email`, `password`, `time`) VALUES ( '$fullname', '$user_email', '$password', current_timestamp())" ;
        // Executing the query  
    $result = mysqli_query($conn,$sql) ;
        // Checking the query !
    if($result) {
        // echo "user registered successfully <br>  ";
        header("Location: Sneakerhead.html");
    }

    else {
        echo " we are facing a issue please try again later  " ;
    }
}
    
    
}
 


?>

<!-- INSERT INTO `sing_up_user` (`user_id`, `full_name`, `email`, `password`, `time`) VALUES (NULL, 'junaid', 'sayedjunaid143@gmail.com', 'junaid21', current_timestamp()); -->

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Sneakerhead--Singup.css">
        <title>Login in to SNEAKERHEAD  </title>
    </head>
    <body>
         <!-- NAVBAR -->
        <div id="heading" >
            <div id="logo">
                <h1 id="logohead"> SNEAKERHEAD  </h1>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&display=swap" rel="stylesheet">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            </div>
        </div>
        <?php
        //  $existemail = false ;
        if($existemail) {
            echo '<div class ="existemail" id = "existemail">
            Invalid! Email is already registered please  login!! 
            <div class = "dismissalert" id = "dismiss" onclick = "dismis()" > X </div>
            </div>'
            ;
        }
         echo "    
        <style>
         .dismissalert {
             display : inline-block ;
             color :white;
             font-weight : bold ;
             margin-left : 900px ;
             background-color :  #DF2E2E ;
             cursor:pointer;  
            }
             .existemail {
             /* border :1px solid black ; */
             margin-top :10px ; 
             padding : 13px  ;
             background-color :  #DF2E2E ;
             color :white  ;
             font-size : 18px ;
             font-family: 'Poppins',sans-serif;
            }
        </style> " ;
        echo '
        <script>
            let dismiss =  document.getElementById("dismiss") ;
            let alert =  document.getElementById("existemail") ;

            function dismis(){
                dismiss.style.display = "none"; 
                alert.style.display = "none"; 
            }
        </script>' ;
        
        ?>
    
        <div class="container">
           <div class="intro-text">
               <h2>Create Account</h2>
               <p>Already have an account ? <a href = "Sneakerhead.html" > Login!</a></p>
           </div>
           <form action="Sneakerhead--Singup.php" method="POST"> 
               <input type="text" name="fullname" placeholder="Full Name" required/>
               <input type="email" name="email" placeholder="Email" required/>
               <input type="password" name="password" placeholder="Password" required/>
               <div class="check-box">
                   <input type="checkbox" id="check" required />
                   <label for="check"> I have read and agree to the 
                       <a href="#">Terms & privacy </a>
                   </label>
               </div>
               <button type="submit">Sing up</button>
           </form>
        </div>
            <!-- To Get The Output of all the records from the database   -->
        <?php
        // $n = 0;
        // $sql = "SELECT * FROM sing_up_user";
        // $result = mysqli_query($conn,$sql) ;
        
        // while($row = mysqli_fetch_array($result)){
        //     $n = $n +1 ;
        //     echo $n. " " ;
        //     echo $row ["fullname"] . "   <br>" ;
        //     echo $row ["email"] . "   <br>" ;
        //     echo $row ["password"] . "   <br>" ;
        //     echo $row ["time"] . "   <br>" ;
        // }
        
        ?>
        <!-- WORKING ON IT !!! -->
</html>