<?php

session_start();
include("includes/connection.php");
include("includes/functions.php");

$errorMsg="";
$successMsg="";

if(!($_SESSION['userLoggedIn']))
{
    header("location: index.php");
}
$id= $_SESSION["userLoggedIn"];

if(isset($_POST['change']))
{
    $oldpin = validateForm($_POST['opin']);
    $pin1 = validateForm($_POST['pin1']);
    $pin2 = validateForm($_POST['pin2']);

    $query = "SELECT * FROM login WHERE l_id=$id";
    $result = mysqli_query($conn , $query);

    while($rows = mysqli_fetch_assoc($result))
    {
        $opin = $rows['pin'];
    }

    if($opin == $oldpin)
    {
        if($pin1 == $pin2)
        {
            if($pin1 < 10000 && $pin1 > 1000)
            {
                $query2 = "UPDATE login SET pin=$pin1 WHERE l_id=$id";
                $result2 = mysqli_query($conn,$query2);

                $successMsg ="PIN changed Successfuly";
            }
            else
            {
                $errorMsg ="PIN should be 4 digits";
            }
        }
        else
        {
            $errorMsg = "New Passwords should be same";
        }
    }
    else
    {
        $errorMsg = "Old PIN enter does not match" ;
    }
}

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

        <div class="row align-items-center justify-content-center" id="rowHeight">
            <div class="text-white"> <?php echo $errorMsg; echo $successMsg; ?></div>
            <form style="width: 80%;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method="post">
                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="input" class="col-form-label text-white">Enter your Current password:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="inputT" name="opin">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="input" class="col-form-label text-white">Enter your New Password:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="inputT" name="pin1">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="input" class="col-form-label text-white">Re-Enter your New Password:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="inputT" name="pin2">
                    </div>
                </div>
                <div class="text-alignment col-12" id="pinButton">
               
                   <button type="submit" class="btn btn-outline-light px-4 mx-3" name="change">Submit</button> 
                   <a href="home.php" id="aStyle" class="btn btn-outline-light px-4 mx-3">Back</a>
                </div>
           </form>
           
        
        </div>
    </div>
    

    
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>