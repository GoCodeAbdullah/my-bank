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

if(isset($_POST['fundtrans']))
{
    $cnic_r = validateForm($_POST['cnic_r']);
    $funds = validateForm($_POST['funds']);

    $query = "SELECT * FROM login WHERE l_id=$id";
    $result= mysqli_query($conn , $query);
    while($rows = mysqli_fetch_assoc($result))
    {
        $amount = $rows['money'];
    }

    $query2 = "SELECT * FROM login WHERE cnic=$cnic_r";
    $result2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($result2)>0)
    {
        if($amount>$funds)
        {
            $amount = $amount - $funds;
            $query3 = "UPDATE login SET money=$amount WHERE l_id =$id";
            $result3 = mysqli_query($conn,$query3);

            $query4 = "UPDATE login SET money=$funds WHERE cnic =$cnic_r";
            $result4= mysqli_query($conn,$query4);

            $successMsg ="Message Successful";
        }
        else
        {
            $errorMsg = "Not Sufficient Balance";
        }
    }
    else
    {
        $errorMsg = "User not Exist";
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
            <form style="width: 80%;" class="mt-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method="post">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="input" class="col-form-label text-white">Enter account number of Reciever:</label>
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" id="tTooltip" name="cnic_r">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mt-2">
                        <label for="inputT" class="col-form-label text-white">Enter amount to be Transfer:</label>
                    </div>
                    <div class="input-group col-md-6">
                        <div class="input-group-post">
                          <span class="input-group-text" id="tTooltip">PKR.</span>
                        </div>
                        <input type="text" class="form-control" id="tTooltip" name="funds">
                    </div>
                </div>
                <div class="text-alignment col-12" id="pinButton"> 
                    <button type="submit" class="btn btn-outline-light px-4 mx-3" name="fundtrans">Submit</button> 
                    <a href="home.html" id="aStyle" class="btn btn-outline-light px-4 mx-3">Back</a>
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