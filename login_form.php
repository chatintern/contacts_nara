<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ログインフォーム</title>

</head>

<body>
    <h1>ログイン画面</h1>
    <form action="login.php" method="POST">
    <div>
        <label>
            id:
            <input type="text" name="id" required>
        </label>
    </div>
        <label>
            パスワード:
            <input type="password" name="pass" required>
        </label>
    <input type="submit" value="ログイン">
    </form>    
</body>