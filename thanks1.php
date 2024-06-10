<?php 
header("X-Frame-Options: DENY");
?>

<!-- 完了画面 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせフォーム</title>

</head>

<body>
    <h2>完了画面</h2>
    <p>送信が完了しました。</p>

    <?php
    function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
    //フォームデータの取得
    $company = escape(isset($_POST['company']) ? $_POST['company'] : '');
    $name = escape(isset($_POST['name']) ? $_POST['name'] : ''); 
    $email = escape(isset($_POST['email']) ? $_POST['email'] : '');
    $type = escape(isset($_POST['type']) ? $_POST['type'] : '');
    $content = escape(isset($_POST['content']) ? $_POST['content'] : '');
    

    $time = new DateTime();
    $time->setTimeZone(new DateTimeZone('Asia/Tokyo'));

    //データベース接続
    $dsn = 'mysql:dbname=inquiryform;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);

    //データの追加
    $sql = 'INSERT INTO inquiry (company, name, email, type, content, time) 
    VALUES (:company, :name, :email, :type, :content, :time)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':company', isset($company) ? $company : '');
    $stmt->bindValue(':name', isset($name) ? $name : '');
    $stmt->bindValue(':email', isset($email) ? $email : '');
    $stmt->bindValue(':type', isset($type) ? $type : '');
    $stmt->bindValue(':content', isset($content) ? $content : '');
    $stmt->bindValue(':time', $time->format('Y/m/d H:i'));
    $stmt->execute();


    ?>
</body>

</html>