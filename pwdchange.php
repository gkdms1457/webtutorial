<?php
    include "lib.php";

    $uid = $_POST['userid'];
    $name = $_POST['uname'];
    $email = $_POST['email'];

    $uid = htmlspecialchars(mysqli_real_escape_string($conn,$uid));
    $name = htmlspecialchars(mysqli_real_escape_string($conn,$name));
    $email = htmlspecialchars(mysqli_real_escape_string($conn,$email));
    
    $query = "SELECT uid FROM uid='$uid' and name='$name' and email='$email' ";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if ($num === 0){
?>        
        <script>
            alert('일치하는 아이디가 없습니다');
            document.location.href="/index.php"
        </script>
<?php
    }else if ($num === 1){
        echo "<script>alert('비밀번호는 $arr[1]입니다')</script>";
?>        
        <script>
            document.location.href="/login.php";
        </script>
<?php
    }else {
        echo "<script>alert('오류...관리자에게 문의하세요')</script>";
        echo "123";
        echo $num;
?>        
        <script>
            //document.location.href="/";
        </script>
<?php
    }
?>