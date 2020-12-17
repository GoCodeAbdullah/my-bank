<?php
session_start();

if(!($_SESSION['userLoggedIn']))
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="body">
    <div class="container height-75 background-blue align-items-center">
        <div class="row align-items-center" id="header">
            <a href=""></a>
            <img src="./img/Money bag 64.png" alt="">
            <h1 id="headerHead">Comsats Bank</h1>
        </div>  
        <div class="row p-3">
            <div class="col-md-4 text-alignment my-4">
                <a href="checkBalance.php" id="aStyle">
                    <img src="./img/icons8-scales-100.png" alt="" id="homeIcons">
                    <p class="font-small" >Check Balance</p>
                </a>
            </div>
            <div class="col-md-4 text-alignment my-4">
                <a href="deposit.php" id="aStyle">
                    <img src="./img/deposit.png" alt="" id="homeIcons">
                    <p class="font-small" style="display: block;">Deposit</p>
                </a>
            </div>
            <div class="col-md-4 text-alignment my-4">
                <a href="changepin.php" id="aStyle">
                    <img src="./img/icons8-settings-50.png" alt="" id="homeIcons">
                    <p class="font-small">Change PIN</p>
                </a>
            </div>
            <div class="col-md-4 text-alignment my-4">
                <a href="withdraw.php" id="aStyle">
                    <img src="./img/bill.png" alt="" id="homeIcons">
                    <p class="font-small">Withdraw</p>
                </a>
            </div>
            <div class="col-md-4 text-alignment my-4">
                <a href="fundtransfer.php" id="aStyle">
                    <img src="./img/transfer.png" alt="" id="homeIcons">
                    <p class="font-small">Funds Transfer</p>
                </a>
            </div>
            <div class="col-md-4 text-alignment my-4">
                <a href="billPayment.php" id="aStyle">
                    <img src="./img/bill.png" alt="" id="homeIcons">
                    <p class="font-small">Bill Payment</p>
                </a>
            </div>
            <div class="col-12 text-alignment">
                <a href="login.php" class="btn btn-outline-light">Log Out</a>
            </div>
        </div> 
    </div>
        
    


    
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>