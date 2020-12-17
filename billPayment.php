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
            <form style="width: 80%;" class="mt-5">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="input" class="col-form-label text-white">Enter Reference Number of Your Bill:</label>
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" id="inputT">
                    </div>
                </div>
            </form>
            <div class="text-alignment col-12" id="pinButton"> 
                <input type="button" value="Bill Check" class="btn btn-outline-light px-4 mx-3"> 
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