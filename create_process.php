<?php
    include "lib.php";

    $target_dir = "./fileupload/";

    $subject = $_POST['subject'];
    $memo = $_POST['memo'];
    $total = count($_FILES["fileupload"]["name"]);
    $uid = $_SESSION['isLogin'];

    $subject = mysqli_real_escape_string($conn,$subject);
    $memo = mysqli_real_escape_string($conn,$memo);
    
    $regdate = date("Y-m-d");
    $ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
    
    if(empty($_FILES["fileupload"]["name"][0])){ $total = 0;}

    echo "$total";
    if (empty($subject)){
        echo "<script>parent.alert('제목을 입력해주세요');</script>";
        header('Location: /create.php');
        exit();
    }

    for ($i=0; $i < $total; $i++) {

        $target_file = $target_dir.basename($_FILES["fileupload"]["name"][$i]);
        $ext = pathinfo($target_file,PATHINFO_EXTENSION);
        $filename = basename($target_file,".$ext");
        
        $num = 1;
        if(file_exists($target_file)) {
            while(file_exists($target_file)) {
                $filename2 = $filename."($num)";
                $target_file = $target_dir.$filename2.".$ext";
                $num++;
            }
        }
        
        if(move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],$target_file)) {
            $sql = "INSERT INTO fileupload (realname,changename,uid, boardsubject)
                VALUES ('".$filename.".$ext"."','$target_file','$uid','$subject')";
            mysqli_query($conn, $sql);
        } else {
            echo "<script>alert('업로드를 성공하지 못했습니다.');</script>";
            header('Location: /create.php');
            exit();
        }
    }

    $query = "INSERT INTO board (subject, memo, uid, regdate, ip)
        VALUES('$subject','$memo','$uid','$regdate','$ip')";

    mysqli_query($conn, $query);
    header('Location: /index.php');
?>