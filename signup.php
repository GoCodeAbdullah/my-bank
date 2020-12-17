<?php
session_start();

include("includes/connection.php");
include("includes/functions.php");

$loginError="";
$checkError="";

if(isset($_POST['submit']))
{
    echo "Halala";
    if(!($_POST['fname'])||!($_POST['lname'])||!($_POST['email'])||!($_POST['cnic'])||!($_POST['address'])||!($_POST['dob'])||!($_POST['number'])||!($_POST['gender']))
    {
        $loginError="All forms crededentials should be filled";
    }
    else
    {
        $fname = validateForm($_POST['fname']);
        $lname = validateForm($_POST['lname']);
        $email = validateForm($_POST['email']);
        $cnic = validateForm($_POST['cnic']);
        $address= validateForm($_POST['address']);
        $dob = validateForm($_POST['dob']);
        $number = validateForm($_POST['number']);
        $gender = validateForm($_POST['gender']);
    }
    if(!($_POST['checkbox']))
    {
        $checkError="Term and Condition should be Selected";
    }

    $pin = mt_rand(1000,9999);

    if($fname && $lname && $email && $cnic && $address && $dob && $number && $gender)
    {
        $query = "INSERT INTO users(id,fname,lname,email,cnic,address,dob,phone,gender) VALUE (NULL,'$fname','$lname','$email','$cnic','$address','$dob',$number,'$gender')";

        $result = mysqli_query($conn,$query);
    }
    if($result)
    {
        $query2="INSERT INTO login(l_id,cnic,pin,money) VALUE (NULL,'$cnic','$pin',0)";
        $result2= mysqli_query($conn,$query2);

        if($result2)
        {
            echo "\nTri";
            $query3= "SELECT l_id FROM login WHERE cnic = '$cnic' ";
            $result3 = mysqli_query($conn,$query3);
            

            if(mysqli_num_rows($result3)>0)
            {
                while($row=mysqli_fetch_assoc($result3))
                {
                    $id = $row['l_id'];
                }
            }
            echo $id;

           header("location: success.php?id=$id");
        }
        else 
        {
            // something went wrong
            echo "Error: ". $query2 ."<br>" . mysqli_error($conn);
        }

    }
    else {
            
        // something went wrong
        echo "Error: ". $query ."<br>" . mysqli_error($conn);
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
    <div class="container height-72">
        <div class="row align-items-center" id="header">
            <img src="./img/Money bag 64.png" alt="">
            <h1 id="headerHead">Comsats Bank</h1>
            <?php echo $loginError ."<br>". $checkError; ?>
        </div>

        

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="row" id="signupform">
            
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">First Name</label>
                    <input type="text" class="form-control" id="input" name="fname" >
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">Last Name</label>
                    <input type="text" class="form-control" id="input" name="lname" >
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">Email Address</label>
                    <input type="Email" class="form-control" id="input" name="email">
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">CNIC Number</label>
                    <input type="text" class="form-control" id="input" name="cnic">
                </div>
                <div class="col-md-8">
                    <label for="input" class="text-white mt-2">Address</label>
                    <input type="text" class="form-control" id="input" name="address">
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">Date of Birth</label>
                    <input type="date" class="form-control datepicker" id="input" name="dob">
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">Mobile Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="tooltip">+92</span>
                        </div>
                        <input type="tel" class="form-control" id="input" name="number" >
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="input" class="text-white mt-2">Gender</label><br><br>
                    <input type="radio" name="gender" value="Male"><label for="gender"   class="text-white">Male      </label>
                    <input type="radio" name="gender" value="Female"><label for="gender" class="text-white">Female</label>
                </div>
                <div class="col-md-6 my-3">
                    <input type="checkbox" name="checkbox[]" id="checkbox" class="p-5">
                    <small class="text-white">I have read terms and condtion</small>
                </div>
                <div class="col-md-6 my-3" id="signupbutton">
                    <button type="submit" class="btn btn-outline-light px-5" name="submit">Submit</button>
                </div>
           </div>
        </form>
        
    </div>


    
    <!-- jQUERY -->
    <script src="./js/jQuery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>