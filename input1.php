<!-- 入力画面 -->

<?php 
header("X-Frame-Options: DENY");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせフォーム</title>
</head>

<body>
    <form action="confirm1.php" method="POST">
        <h2>入力画面</h2>
        <div>
            <label for="company">会社名：</label>
            <input type="text" id="company" name="company" >
        </div>
        <div>
            <label for="name">お名前：</label>
            <input type="text" id="name" name="name" required>
        </div>    
        <div>
            <label for="email">メールアドレス：</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div>
            <label for="type">お問い合わせ種別：</label>
            <select id="type" name="type" required>
                <option value="">選択してください</option>
                <option value="サービス内容について">サービス内容について</option>
                <option value="見積もりについて">見積もりについて</option>
                <option value="その他">その他</option>
            </select>
        </div>
        <div>
            <label for="content">お問い合わせ内容：</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div>
            <input type="submit" name="btn_confirm" value="確認する">
        </div>
</form>       
</body>

</html> 