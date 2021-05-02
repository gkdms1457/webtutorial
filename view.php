<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script>
            function reply_update_open() {
                document.getElementById("replyupdate").style.display = 'block';
            }
            function reply_update_close() {
                document.getElementById("replyupdate").style.display = 'none';
            }
        </script>
    </head>
    <body>
        <?php
            include "lib.php";

            $idx = $_GET['idx'];
            $idx = htmlspecialchars(mysqli_real_escape_string($conn, $idx));

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
                    <td> 
                        <?= $data['replycontents'] ?>
                        <?php
                            if($_SESSION['isLogin'] === $data['uid']) {
                        ?>
                                
                                <div style="float:right">
                                    <span  onclick = "reply_update_open()"> 수정</span>
                                    <a href = "delreply_process.php?idx=<?=$idx?>&content=<?=$data['replycontents']?>"> 삭제</a>
                                </div>
                                <?php
                                    echo "<fieldset id='replyupdate' style='margin-top:20px; display:none;'>";
                                    echo "<legend>댓글 수정란</legend>";
                                    echo "<form id='replyupdate_' action='replyupdate_process.php' method='post'>";                                        echo "<input type='hidden' name='boardnum' value='$idx'>";
                                    echo "<input type='hidden' name='old_replycontent' value='".$data['replycontents']."'>";
                                    //텍스트 전송
                                    echo "<textarea type='text' name='textarea' style='width:100%; height:100px; border:1px solid; resize:none;'>".$data['replycontents']."</textarea>";
                                    //등록 취소 혹은 등록
                                    echo "</form>";
                                    echo "<button style='float:right; border:1px solid; background:none;' onclick='reply_update_close()'>취소</button><button style='float:right; border:1px solid; background:none;' onclick='replyupdate_.submit()'>댓글 수정</button>";
                                    echo "</fieldset>";
                                ?>
                                    
                                
                        <?php
                            }
                        ?>
                    </td>
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