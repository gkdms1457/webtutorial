<?php
    include "lib.php";

    $idx = $_GET['idx'];
    $idx = htmlspecialchars(mysqli_real_escape_string($conn, $idx));
    $uid = $_SESSION["isLogin"];
    $boarduidQuery = "select uid from board where idx = '$idx'";
    $result = mysqli_query($conn,$boarduidQuery);
    $rsarray = mysqli_fetch_array($result);
    if($uid === $rsarray['uid']){
        $query = "DELETE FROM board WHERE idx = '$idx'";

        mysqli_query($conn, $query);

        header('Location: /index.php');
    }
    else {
        echo "<script>alert('삭제 권한없음');</script>";
        header('Location:/index.php');
    }
?>