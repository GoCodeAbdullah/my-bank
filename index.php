<?php

session_start();
$loginError="";

include('includes/connection.php');
include('includes/functions.php');
echo " In progeam ";


if(isset($_POST['login']))
{
    echo " Halalala ";
    

    $accR = validateForm($_POST['accn']);
    $pinR = validateForm($_POST['pin']);

    $query = "SELECT * FROM login WHERE cnic='$accR' ";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        while($rows = mysqli_fetch_assoc($result))
        {
            $pinO = $rows['pin'];
            $id   = $rows['l_id'];
        }

        echo $pinO;
        echo $id;

        if($pinO == $pinR)
        {
            $_SESSION['userLoggedIn'] = $id;
            header("location: home.php?userid=$id");           
        }
        else
        {
            $loginError = "Password Not correct";
        }
    }
    else
    {
        $loginError = "Account not Exist";
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

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 height-75" id="left">
                <img src="./img/BankThumbnail_48px.png" alt="" id="abs">
                <h1 id="mainHead" class="text-white">Welcome to Comsats Bank</h1>
                <img src="./img/Money bag 64.png">
                <div id="width1"></div>
                <div id="width2"></div>
            </div>
            <div class="col-md-6 col-sm-12 height-75" id="right">
            <?php echo $loginError; ?>
                <h2 class="text-white">Login Details</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method="post" >
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-white text-uppercase">Account no.</label>
                      <input type="text" class="form-control"  id="input" name="accn">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="text-white text-uppercase">Pin Code</label>
                      <input type="password" class="form-control"  id="input" name="pin">
                    </div>
                    <button type="submit" class="btn btn-outline-primary" name="login">Sign in</button>
                  </form>
                  <div class="row justify-content-between">
                      <div class="col-6"><span class="text-white">Don't have an acccount</span></div>
                      <div class="col-6"><a href="signup.php" class="text-uppercase">Sign Up</a></div> 
                  </div>
            </div>
        </div>
    </div>
    
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>