<?php
session_start();

include('includes/connection.php');

if(isset( $_GET['id']))
{
    $cnic;
    $pin;
    
    
    $id =$_GET['id'];
    echo ($id);
    $query = "SELECT * from login where l_id=$id";
    $result = mysqli_query($conn ,$query);

    if(mysqli_num_rows($result)>0)
    {
        while( $row = mysqli_fetch_assoc($result) )
        {
            $pin = $row['pin'];
            $cnic = $row['cnic'];
            
        }
    }
    else 
        {
            // something went wrong
            echo "Error: ". $query ."<br>" . mysqli_error($conn);
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="body">
    <div class="container height-72">
        <div class="row align-items-center" id="header">
            <img src="./img/Money bag 64.png" alt="">
            <h1 id="headerHead">Comsats Bank</h1>
            
        </div>

        
        <div class="row background-blue">
            <div class="col-md-12 text-alignment">
                <h1 class="text-white"> Congrats You are Registered Successfully</h1>
                <p class="text-white">Your CNIC is: <?php echo $cnic; ?></p>
                <p class="text-white">Your PIN is: <?php echo $pin; ?></p>

                <p class="text-white">Remeber it for your use</p>

                <a class="btn btn-outline-light px-5" href="index.php">Login</a>
            </div>
        </div>
        
        
    </div>


    
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>