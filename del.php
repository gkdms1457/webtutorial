<?php
    include "lib.php";

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($conn, $idx);

    $query = "DELETE FROM board WHERE idx = '$idx'";

    mysqli_query($conn, $query);

    header('Location: /index.php');
?>