<?php
session_start();
include("includes/connection.php");

if(!($_SESSION['userLoggedIn']))
{
    header("location: index.php");
}
$id= $_SESSION["userLoggedIn"];
$query= "SELECT money FROM login WHERE l_id=$id";
$result= mysqli_query($conn,$query);
$money="";

while($rows=mysqli_fetch_assoc($result))
{
    $money = $rows['money'];
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="body">
    <div class="container height-75 background-blue">
        <div class="row align-items-center" id="header">
            <img src="./img/Money bag 64.png" alt="">
            <h1 id="headerHead">Comsats Bank</h1>
        </div>   
        <div id="rowHeight" class="row align-items-center justify-content-center">
            <form style="width: 80%;" class="mt-5">
                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="input" class="col-form-label text-white">Your Current Balance is:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group-post">
                          <span class="input-group-text" id="tTooltip">PKR. <?php echo $money; ?></span>
                          
                        </div>
                        
                            
                    
                        
                    </div>
                </div>
            </form>
            <div class="text-alignment col-12" id="pinButton"> 
                <a href="home.php" id="aStyle" class="btn btn-outline-light px-4 mx-3">Back</a>
            </div>
        </div>
    </div>
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>