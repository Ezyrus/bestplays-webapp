<?php

require_once "databaseConnection.php";

if (isset($_POST['signup'])) {

    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['ingamename'])) {

        $uIusername = $_POST['username'];
        $uIpassword = $_POST['password'];
        $validationQuery = "select * from players where username='$uIusername'";
        $validationResult = mysqli_query(databaseConnection(), $validationQuery);
        $validationCount = mysqli_num_rows($validationResult);

        if ($validationCount) {
            echo '<script>alert("Username ' . $uIusername . ' already exist, please choose another.")</script>';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ingamename = $_POST['ingamename'];

            $playerInfoQuery = "insert into players(username,password,ingamename) values('$username','$password','$ingamename')";

            $initiatePlayerInfo = mysqli_query(databaseConnection(), $playerInfoQuery);
            echo '<script>alert("Player Registered Successfully")</script>';
        }
    } else {
        echo '<script>alert("All fields are required!")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEST PLAYS | REGISTER</title>
    <link rel="stylesheet" href="styles/register.css">

    <!-- BOOSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <header>
        <div id="logo">
            <h3><a href="register.php">Show us what you got!</a></h3>
        </div>
        <div id="addInfo">
            <h3 data-toggle="tooltip" data-placement="top" title="CLICK TO LOGIN"><a href="login.php" id="clickhere">CLICK HERE TO LOGIN</a></h3>
        </div>
    </header>

    <section class="d-flex justify-content-around" id="registerSection">

        <div class="d-flex flex-column justify-content-center align-items-center" id="pageInsights">
            <div class="embed-responsive embed-responsive-16by9" style="width:800px; height:450px">
                <iframe id="high1" src="assets/highlights1.mp4" allowfullscreen></iframe>

            </div>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center" id="register">

            <form action="#" method="post" class="playerInformations">
                <h3 id="mainTitle">REGISTER</h3>
                <div class="form-row" id="registerForm">
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group col-md-15">
                        <label for="ign">In Game Name</label>
                        <input type="text" class="form-control" id="ingamename" name="ingamename" placeholder="IGN#XyYx">
                    </div>

                </div>
                <hr>
                <button type="submit" class="btn btn-primary" id="btn-signup" name="signup">REGISTER</button>
            </form>
        </div>
    </section>




</body>

</html>