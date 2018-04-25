<?php
    session_start();
    $tid = $_POST['tid'];
    $_SESSION['msgto'] = $tid;
?>