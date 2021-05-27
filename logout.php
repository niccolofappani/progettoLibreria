<?php
    session_start();
    unset($_SESSION['logged']);
    echo "<script>history.go(-1);</script>";
?>