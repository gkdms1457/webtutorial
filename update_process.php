<?php
    include "lib.php";

    $subject = $_POST['subject'];
    $memo = $_POST['memo'];
    $idx = $_POST['idx'];

    $subject = mysqli_real_escape_string($conn,$subject);
    $memo = mysqli_real_escape_string($conn,$memo);
    $idx = mysqli_real_escape_string($conn, $idx);

    $query = "UPDATE board SET subject='$subject', memo='$memo' WHERE idx='$idx'";

    mysqli_query($conn, $query);
    header('Location: /index.php');
?>