<?php
    session_start();
    session_destroy();
    header("location:../../MVC/View/index.php");
?>