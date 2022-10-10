<?php
    session_start();
    require_once "databaseConnection.php";

    if (isset($_POST['uploadVideo']) && isset($_FILES['theVideo'])) {
        $highlight = $_FILES['theVideo']['name'];
        $tmp_name = $_FILES['theVideo']['tmp_name'];
        $error = $_FILES['theVideo']['error'];

        $userLoggedOn = $_SESSION['username'];
        $userRank = $_POST['rank'];

        if ($error === 0) {
            $video_ex = pathinfo($highlight, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);
            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

            if (in_array($video_ex_lc, $allowed_exs)) {
                $newHighlightName = uniqid("video-", true) . '.' . $video_ex_lc;
                $highlightsPath = 'highlights/' . $newHighlightName;
                move_uploaded_file($tmp_name, $highlightsPath);
                echo '<script>alert("You successfully uploaded a file.")</script>';

                $insertHighlights = "insert into highlights(video_url,player_username,rank) 
                    values('$newHighlightName','$userLoggedOn','$userRank')";
                mysqli_query(databaseConnection(), $insertHighlights);
            } else {
                echo '<script>alert("You cannot upload files of this type")</script>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/Mainstyles.css">
        <title>BEST PLAYS</title>

        <!-- BOOSTRAP CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- BOOSTRAP JS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- BOOSTRAP JQUERY.JS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    </head>

<body>

    <header>
        <div id="userLogged">
            CODENAME: <?php echo $_SESSION['username']; ?>
        </div>
        <div class="logo">
            <h3>BEST PLAYS</h3>
        </div>
        <ul class="nav-links">
            <li><a href="#home">home</a>
            </li>
            <li><a href="#submit">submit</a></li>
            <li><a href="#highlightsSection">highlights</a></li>
            <li id="logout"><a href="logout.php">log out</a></li>
        </ul>
    </header>

    <div class="section-container">

        <section id="home">

            <div class="typing">
                <h2 class="text-uppercase">reachthetop</h2>
            </div>

        </section>

        <section class="d-flex justify-content-around" id="submit">

            <div class="d-flex flex-column justify-content-center align-items-center" id="uploadInsights">
                <div id="insightContainer" class="embed-responsive embed-responsive-16by9">
                    <h3 id="insight-text01">YOU MUST'VE ONE RIGHT?</h3>
                    <iframe id="upInsights" src="assets/highlights1.mp4" allowfullscreen></iframe>
                </div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center" id="uploadHighlights">
                <form action="#" method="post" enctype="multipart/form-data">
                    <h2 id="mainTitle" class="h2">UPLOAD YOUR BEST PLAYS</h2>
                    <div class="form-row" id="upHighForm">
                        <div class="form-group col-md-12">
                            <label for="rank">Recent Rank</label>
                            <input type="text" class="form-control" id="rank" name="rank" placeholder="Ex. Iron, Platinum, Radiant ... ">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="bestPlayTitle">Your Best Play</label>
                            <input type="file" class="form-control" id="theVideo" name="theVideo">
                        </div>

                    </div>
                    <hr>

                    <button type="submit" class="btn" name="uploadVideo" id="btn-upload">UPLOAD!</button>

                </form>
            </div>

        </section>


        <section class="d-flex flex-column justify-content-center align-items-center" id="highlightsSection">
            <h2 id="highlightsTitle">THEBESTPLAYS</h2>

            <div class="d-flex flex-column justify-content-center align-items-center" id="highlightsContainer">

                <?php
                require_once "databaseConnection.php";

                $selectHighlights = "SELECT * FROM highlights order by plays_id desc";
                $selectHighlightsResults = mysqli_query(databaseConnection(), $selectHighlights);
               
                // $selectCodenames = "SELECT player_username FROM highlights";
                // $selectCodenamesResult = mysqli_query(databaseConnection(), $selectCodenames);
              
               // $rank = helpp
                if (mysqli_num_rows($selectHighlightsResults) > 0) {
                    while ($highlights = mysqli_fetch_assoc($selectHighlightsResults)) {
                ?>
                        <div id="theHighlightsMainContainer">
                            <h2 id="theHighlightsCodeName">Codename : <?= $highlights['player_username'] ?></h2>
                            <h5 id="theHighlightsRank">Rank : <?= $highlights['rank'] ?></h5>
                            <video id="theHighlightsFrame" src="highlights/<?= $highlights['video_url'] ?>" controls></video>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>


</body>

</html>