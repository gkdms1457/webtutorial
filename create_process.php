<?php
    include "lib.php";

    $subject = $_POST['subject'];
    $memo = $_POST['memo'];

    $subject = mysqli_real_escape_string($conn,$subject);
    $memo = mysqli_real_escape_string($conn,$memo);
    
    $uid = $_SESSION['isLogin'];
    $regdate = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';

    $query = "INSERT INTO board (subject, memo, uid, regdate, ip)
        VALUES('$subject','$memo','$uid','$regdate','$ip')";

    mysqli_query($conn, $query);
    header('Location: /index.php');
?>