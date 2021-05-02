<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
        <?php
            include "lib.php";
            
            $isLogin = $_SESSION['isLogin'];

            if(!$isLogin){
        ?>
                <a href = "login.php">로그인</a>
                <a href = "signup.php">회원가입</a>
                
        <?php
            } else{
                echo "'$isLogin'님 반갑습니다!";
        ?>
                <a href = "logout.php">로그아웃</a> <br>

                <p>
                    <table width = 800 border="1">
                        <tr>
                            <th style = "width:10%;">No</th>
                            <th style = "width:60%;">제목</th>
                            <th style = "width:15%;">작성자</th>
                            <th style = "width:15%;">작성시간</th>
                        </tr>
                    <?php
                        $query = "SELECT * FROM board ORDER BY idx desc";
                        $result = mysqli_query($conn, $query);
                        
                        while($data= mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td> <?=$data['idx']?> </td>
                            <td> <a href = "view.php?idx=<?=$data['idx']?>" ><?= $data['subject'] ?></a> </td>
                            <td> <?= $data['uid'] ?> </td>
                            <td> <?= $data['regdate'] ?> </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </table>
                </p>

                <a href ="create.php"> 글쓰기 </a>
        <?php
            }
        ?>
    </body>
</html>