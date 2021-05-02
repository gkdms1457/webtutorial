<?php
    include 'lib.php';

    $boardidx = $_POST['boardnum'];
    $old_content = $_POST['old_replycontent'];
    $uid = $_SESSION['isLogin'];
    $replydate = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
    $replycontents = $_POST['textarea'];
    
    $replycontents = htmlspecialchars(mysqli_real_escape_string($conn,$replycontents));
    $boardidx = htmlspecialchars(mysqli_real_escape_string($conn,$boardidx));
    $old_content = htmlspecialchars(mysqli_real_escape_string($conn,$old_content));
    $uid = htmlspecialchars(mysqli_real_escape_string($conn,$uid));

    $query = "update reply set replycontents='$replycontents' where boardidx='$boardidx' and replycontents = '$old_content'";
    
    mysqli_query($conn, $query);
    
?>
<script>
    location.href="/view.php?idx=<?=$boardidx?>"
</script>