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
                    <th style = "width:20%;"> 제목 </th>
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
                    <td> 
                    <?php
                        $writer = $data['uid'];
                        $boardsub = $data['subject'];
                        $sql = "SELECT * FROM fileupload WHERE uid = '$writer' AND boardsubject = '$boardsub'";
                        $res = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($res)) {
                        echo "<a href='download.php?filepath=".$row['changename']."&filename=".$row['realname']."'>".$row['realname']."</a>";
                        }
                    ?>
                    </td>
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
        <form action="reply_process.php" method="post">
            <input type="hidden" name="idx" value="<?=$idx?>">
            <p>
                <textarea type="text" name="replycontent" style = "float:left; width:700px; height:100px; border:1px solid;"></textarea>
                <input type="submit" style="width:100px; height:100px" value="댓글 등록">
            </p>
        </form>
        <p>
            <table width = 800 border="1">
                <tr>
                    <th style = "width:60%;">내용</th>
                    <th style = "width:15%;">작성자</th>
                    <th style = "width:15%;">작성시간</th>
                </tr>
            <?php
                $query = "SELECT * FROM reply where boardidx='$idx'";
                $result = mysqli_query($conn, $query);
                        
                while($data= mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td> <?= $data['replycontents'] ?></td>
                    <td> <?= $data['uid'] ?> </td>
                    <td> <?= $data['replydate'] ?> </td>
                </tr>
            <?php
                }
            ?>
            </table>
        </p>
    </body>
</html>