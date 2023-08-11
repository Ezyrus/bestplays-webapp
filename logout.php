<?php

session_start();
if (session_destroy()) {
    headeR("Location: index.php");
}

?>