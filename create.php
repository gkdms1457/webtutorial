<!DOCTYPE html>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
            include "lib.php";
        ?>
        <form action="create_process.php" method="post" enctype="multipart/form-data">
            <table width = 800 border="1" cellpadding=5>
                <tr>
                    <th> 제목 </th>
                    <td> <input type = "text" name="subject" style = "width:100%;"></td>
                </tr>
                <tr>
                    <th> 내용 </th>
                    <td> 
                        <textarea name="memo" style="width:100%; height:300px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <th> 첨부파일 </th>
                    <td> <input type = "file" name="fileupload[]" multiple="multiple" onchange="this.form.submit()"></td>
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