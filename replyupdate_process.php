<script>
    function reply_update_open() {
        document.style.disply = 'block';
    }
    function reply_update_close() {
        document.style.disply = 'none';
    }
</script>
<?php
    $boardidx = $_POST['boardnum'];
    $old_content = $_POST['old_replycontent'];
    $uid = $_SESSION['isLogin'];
    $replydate = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
    
    $boardidx = mysqli_real_escape_string($conn,$boardidx);
    $old_content = mysqli_real_escape_string($conn,$old_content);
    $uid = mysqli_real_escape_string($conn,$uid);

    $query = "update reply set replycontents='$replycontents', replydate='$replydate', ip='$ip' where boardidx='$boardnum' and replycontents = '$old_replycontent'";
    mysqli_query($conn, $query);
    reply_update_close();
    
?>
<script>
    parent.document.getElementById("replytext").innerHTML = document.getElementById("send").innerHTML;
</script>