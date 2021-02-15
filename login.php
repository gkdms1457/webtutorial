<!DOCTYPE html>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <a href = "login.php">로그인</a>
        <a href = "signup.php">회원가입</a>
        
        <form action="login_signup/login_process.php" method="post">
            <p>
                아이디 : <input type="text" name="userid" placeholder="id">
            </p>
            <p>
                비밀번호 : <input type="password" name="pwd" placeholder="password">
            </p>
            <p>
                <input type="submit" value="로그인">
            </p>
        </form>

    </body>
</html>