<!DOCTYPE html>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            include "lib.php";

            $idx = $_GET['idx'];
            $idx = htmlspecialchars(mysqli_real_escape_string($conn,$idx));

            $query = "SELECT * FROM board WHERE idx = '$idx'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($result);
        ?>
        <form action="update_process.php" method="post">
            <input type="hidden" name="idx" value="<?=$idx?>">
            <table width = 800 border="1" cellpadding=5>
                <tr>
                    <th> 제목 </th>
                    <td> <input type = "text" name="subject" style = "width:100%;" value = "<?=$data['subject']?>"></td>
                </tr>
                <tr>
                    <th> 내용 </th>
                    <td> 
                        <textarea name="memo" style="width:100%; height:300px;"><?=$data['memo']?></textarea>
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
                        <div style="text-align:center;">
                            <input type="submit" value="저장">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>