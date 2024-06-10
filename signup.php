<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録</title>
</head>

<body>
    <h1>新規会員登録</h1>
    <form action="register.php" method="POST">
    <div>
        <label>
            id:
            <input type="text" name="id" required>
        </label>
    </div>
    <div>
        <label>
            パスワード：
            <input type="password" name="pass" required>
        </label>
    </div>
    <input type="submit" value="新規登録">
    </form>
    <p>すでに登録済みの方は<a href="login_form2.php">ログインページ</a></p>
</body>

</html>