<?php
    include "lib.php";

    $name = $_POST['uname'];
    $email = $_POST['email'];

    $name = htmlspecialchars(mysqli_real_escape_string($conn,$name));
    $email = htmlspecialchars(mysqli_real_escape_string($conn,$email));
    
    $query = "SELECT uid FROM user WHERE name='$name' and email='$email' ";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if ($num === 0){
?>        
        <script>
            alert('일치하는 아이디가 없습니다');
            document.location.href="/find_id.php";
        </script>
<?php
    }else if($num === 1) {
        $arr = mysqli_fetch_array($result);
        echo "<script>alert('아이디는 $arr[0] 입니다')</script>";
?>        
        <script>
            document.location.href="/login.php";
        </script>
<?php
    }else {
        echo "<script>alert('$num 오류...관리자에게 문의하세요')</script>";
?>        
        <script>
            document.location.href="/";
        </script>
<?php
    }
?>