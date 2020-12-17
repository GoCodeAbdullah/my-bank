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

if(isset($_POST['depo']))
{
    $deposit = validateForm($_POST['deposit']);

    if($deposit<=10000 && $deposit>0)
    {
        $query = "SELECT money from login where l_id=$id";
        $result = mysqli_query($conn,$query);

        while($rows = mysqli_fetch_assoc($result))
        {
          $amount = $rows["money"];  
        }
        echo $amount." "; 

        $amount = $amount + $deposit ;
        echo $amount." ";
        $query2= "UPDATE login 
        SET money=$amount
        WHERE l_id=$id";
        $result2 = mysqli_query( $conn, $query2 );
    
        if( $result2 ) 
        {
            $successMsg= "Deposit Successful";
        } 
        else 
        {
            echo "Error updating record: " . mysqli_error($conn); 
        }
    }
    else
    {
        $errorMsg = "Amount Should between 1 to 10000";   
    }
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
            <div class="text-white"> <?php echo $errorMsg; $successMsg; ?></div>
            <form style="width: 80%;" class="mt-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method="post">
                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="inputT" class="col-form-label text-white">Enter amount to be deposited:</label>
                    </div>
                    <div class="input-group col-md-6">
                        <div class="input-group-post">
                          <span class="input-group-text" id="tTooltip">PKR.</span>
                        </div>
                        <input type="text" class="form-control" id="inputT" name="deposit">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="input" class="col-form-label text-white">Select channel from where you deposit:</label>
                    </div>
                    <select class="form-control col-md-6" id="inputT">
                        <option disabled selected class="text-secondary active">--Select Payment method--</option>
                        <option class="text-light">Easypaisa</option>
                        <option class="text-light">Jazz Cash</option>
                        <option class="text-light">PayPal</option>
                        <option class="text-light">Payoneer</option>
                    </select>
                </div>
                <div class="text-alignment col-12" id="pinButton"> 
                    <button type="submit" class="btn btn-outline-light px-4 mx-3" name="depo">Submit</button>
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