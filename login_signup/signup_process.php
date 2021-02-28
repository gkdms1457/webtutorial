<?php

    include "../lib.php";

    $uid = $_POST['userid'];
    $pwd = $_POST['pwd'];
    $pwd_check = $_POST['pwdcheck'];
    $uname = $_POST['user_name'];
    $email = $_POST['email'];
    
    $uid = mysqli_real_escape_string($conn,$uid);
    $pwd = mysqli_real_escape_string($conn,$pwd);
    $pwd_check = mysqli_real_escape_string($conn,$pwd_check);
    $uname = mysqli_real_escape_string($conn,$uname);
    $email = mysqli_real_escape_string($conn,$email);

    $existId = "SELECT uid FROM user WHERE uid = '$uid'";
    $Idcheck = mysqli_query($conn,$existId);
    $data = mysqli_num_rows($Idcheck);
    
    if($pwd != $pwd_check){
?>
        <script>
            alert('비밀번호가 일치하지 않습니다.');
            document.location.href="/signup.php"
        </script>
<?php
        exit;
    }
    if ($data !== 0) {
?>
        <script>
            alert('이미 존재하는 아이디 입니다.');
            document.location.href="/signup.php"
        </script>
<?php
        exit;
    }

    $query = "INSERT INTO user (uid, pwd, name, email)
        VALUES(
            '{$uid}',
            '{$pwd}',
            '{$uname}',
            '{$email}' 
        )";
    $result = mysqli_query($conn, $query);
    
    $query = "select * from user where uid = '$uid'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if($data){
?>        
        <script>
            alert('회원가입 성공! 로그인해주세요');
            document.location.href="/index.php"
        </script>
<?php
    }else{
?>
    <script>
        alert('회원가입 실패.. 다시 시도해주세요!');
    </script>
<?php
    }

?>