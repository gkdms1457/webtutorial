<!DOCTYPE html>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            include "lib.php";

            $idx = $_GET['idx'];
            $idx = mysqli_real_escape_string($conn, $idx);

            $query = "SELECT * FROM board WHERE idx = '$idx'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($result);

        ?>
        <form action="create_process.php" method="post">
            <table width = 800 border="1" cellpadding=5>
                <tr>
                    <th> 제목 </th>
                    <td> <?=$data['subject']?></td>
                </tr>
                <tr>
                    <th> 작성자 </th>
                    <td> <?=$data['uid']?></td>
                </tr>
                <tr>
                    <th> 내용 </th>
                    <td> 
                        <?=nl2br($data['memo']);?>
                    </td>
                </tr>
                <tr>
                    <th> 첨부파일 </th>
                    <td> <input type = "file" name="userfile"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <?php
                        if($_SESSION['isLogin'] === $data['uid']){
                    ?>
                        <div style="float:right">
                            <a href = "del.php?idx=<?=$idx?>" onclick = "return confirm('정말 삭제할까요?')"> 삭제 </a>
                            <a href = "update.php?idx=<?=$idx?>"> 수정 </a>
                        </div>
                    <?php
                        }
                    ?>
                        <a href = "index.php"> 목록 </a>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>