<?php
    session_start();
    require_once "databaseConnection.php";

    if (isset($_POST['login'])) {

        $uIusername = $_POST['username'];
        $uIpassword = $_POST['password'];
        $validationQuery = "select * from players where username='$uIusername' and password='$uIpassword'";
        $validationResult = mysqli_query(databaseConnection(), $validationQuery);
        $count = mysqli_num_rows($validationResult);
        
            if ($count > 0) {
                $dbRows = mysqli_fetch_array($validationResult);
                $_SESSION['username'] = $dbRows['username'];
                header('Location:/BestPlays/index.php');
            } else {
                echo '<script>alert("Invalid Username or Password!")</script>';
            }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/loginStyle.css">
    <title>BEST PLAYS | LOG IN </title>

    <!-- BOOSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <header>
        <div id="logo">
            <h3><a href="login.php">Show us what you got!</a></h3>
        </div>
        <div id="addInfo">
            <h3 data-toggle="tooltip" data-placement="top" title="CLICK TO REGISTER"><a href="register.php" id="clickhere">CLICK HERE TO REGISTER </a></h3>
        </div>

    </header>

    <section class="d-flex justify-content-around" id="loginSection">

        <div class="d-flex flex-column justify-content-center align-items-center" id="pageInsights">
            <div class="embed-responsive embed-responsive-16by9" style="width:800px; height:450px">
                <iframe id="high1" src="assets/highlights1.mp4" allowfullscreen></iframe>
            </div>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center" id="login">
            <form action="#" method="post" class="playerInformations">
                <h3 id="mainTitle">LOGIN</h3>
                <div class="form-row" id="loginForm">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <!-- <div class="form-group col-md-15">
                        <label for="ign">In Game Name</label>
                        <input type="text" class="form-control" id="ingamename" name="ingamename" placeholder="IGN#XyYx">
                    </div> -->

                </div>
                <hr>
                <button type="submit" class="btn" id="btn-login" name="login">LOG IN</button>

            </form>

        </div>
    </section>
</body>

</html>