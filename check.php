<?php
    session_start();
    $uname=isset($_SESSION['fname'])?
    $_SESSION['fname']:"";
    echo $uname. "   Your Data Has Added!"

?>
 <br> <br> <br>
 <a href="logout.php">BACK</a>