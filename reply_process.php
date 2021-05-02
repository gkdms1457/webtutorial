<?php
    include "lib.php";

    $replycontent = $_POST['replycontent'];
    $boardidx = $_POST['idx'];

    $replycontent = htmlspecialchars(mysqli_real_escape_string($conn,$replycontent));
    $boardidx = htmlspecialchars(mysqli_real_escape_string($conn,$boardidx));
    
    $uid = $_SESSION['isLogin'];
    $replydate = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';

    $query = "INSERT INTO reply (boardidx, uid, replycontents, replydate, ip)
        VALUES('$boardidx','$uid','$replycontent','$replydate','$ip')";

    mysqli_query($conn, $query);

    $query = "SELECT * FROM reply where boardidx='$boardidx'";
    $result = mysqli_query($conn, $query);
                        
    $data= mysqli_fetch_array($result);
?>
<script>
    location.href="/view.php?idx=<?=$boardidx?>";
</script>