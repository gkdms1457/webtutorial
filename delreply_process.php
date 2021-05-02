<?php
    include "lib.php";

    $idx = $_GET['idx'];
    $content = $_GET['content'];
    $idx = htmlspecialchars(mysqli_real_escape_string($conn, $idx));
    $uid = $_SESSION['isLogin'];
    
    $query = "DELETE FROM reply WHERE uid='$uid' and boardidx = '$idx' and replycontents = '$content' ";

    mysqli_query($conn, $query);
?>
<script>
    location.href="/view.php?idx=<?=$idx?>";
</script>