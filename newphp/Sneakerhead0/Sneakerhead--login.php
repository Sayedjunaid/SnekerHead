<!-- WORKING ON IT  -->
<?php
$server = "127.0.0.1:8111" ;
$username = "root" ;
$password = "" ;
$dbname = "sneakerhead" ;

$conn = mysqli_connect($server, $username, $password , $dbname) ;
if ( $conn ) {
     echo "connected to bd !!" ;
}
else {
    echo " not connected to bd";
}
if($_SERVER["REQUEST_METHOD"]== "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $sql = "SELECT * FROM `sing_up_user` WHERE email= '$email' AND password = '$pass'" ;
    $result = mysqli_query($conn,$sql) ;
    $num = mysqli_num_rows($result);
    if($num==1){
        $usersql = "SELECT fullname FROM `sing_up_user` WHERE email= '$email' AND password = '$pass'";
        $userresult = mysqli_query($conn,$usersql);
        while ($user = mysqli_fetch_array($userresult)){
            echo "welcome" ;
            session_start();
            $_SESSION['user'] = $user['fullname'];
            echo $_SESSION['user'];
        }
       
     

    }
    else{
        echo"sorry";
    }
  
}
// PASSWORD HASHING LEFT 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Sneakerhead--login.css">
        <title>Login in to SNEAKERHEAD </title>
    </head>
    <body>
         <!-- NAVBAR -->
        <div id="heading" >
            <div id="logo">
                <h1 id="logohead"> SNEAKERHEAD</h1>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&display=swap" rel="stylesheet">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            </div>
        </div>
        <div class="container">
           <div class="intro-text">
               <h2>Login into Account</h2>
               <p>Create an account ? <a href = "file:///G:/TYIT%20PROJECT/PROJECT/Sneakerhead/Sneakerhead.html" > Sing up!</a></p>
           </div>
           <form action = "Sneakerhead--login.php" method = "POST">
               
               <input type="email" name="email" placeholder="Email" required/>
               <input type="password" name="password" placeholder="Password" required/>
               <button type="submit">Login</button>
           </form>
        </div>
</html>