<?php

    include "../lib.php";

    $uid = $_POST['userid'];
    $pwd = $_POST['pwd'];
    
    $uid = mysqli_real_escape_string($conn,$uid);
    $pwd = mysqli_real_escape_string($conn,$pwd);

    $query = "select * from user where uid = '$uid' and pwd = '$pwd'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if($data){
        $_SESSION['isLogin']=$uid;
        header('Location: /index.php');
    }else{
?>
    <script>
        alert('로그인정보가 올바르지 않습니다.');
        header('Location: /login.php');
    </script>
<?php
    }

?>