<?php 
header("X-Frame-Options: DENY");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせ一覧</title>
</head>

<body>

    <?php

    function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    session_start();
    $session_id = session_id();
    $_POST['before_session_id'] = isset($_POST['before_session_id']) ? $_POST['before_session_id'] : '';
    if ($session_id == $_POST['before_session_id']) {//ログインしているとき


        //お問い合わせ一覧を表示
        $dsn = "mysql:host=localhost; dbname=inquiryform; charset=utf8";
        $user = 'root';
        $password = '';
    
        try{
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        $sql = 'SELECT * FROM inquiry';
        foreach ($dbh->query($sql) as $row){
            echo "会社名：" . escape($row['company']) . "<br/>";
            echo "名前：" . escape($row['name']) . "<br/>";
            echo "メールアドレス：" . escape($row['email']) . "<br/>";
            echo "お問い合わせ種別：" . escape($row['type']) . "<br/>";
            echo "お問い合わせ内容：" . escape($row['content']) . "<br/>";
            echo "登録日時:" . escape($row['time']) . "<br/>";
            echo "メモ：" . escape($row['memo']) . "<br/>";
            echo "<form id='delete' action='delete_process.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . escape($row['id']) . "'>";
            echo "<input type='hidden' name='before_session_id' value='". $session_id . "'>";
            echo "<button type='submit'>削除</button>";
            echo "</form>";
            echo "<form id='edit' action='edit.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . escape($row['id']) . "'>";
            echo "<input type='hidden' name='before_session_id' value='". $session_id . "'>";
            echo "<button type='submit'>編集</button>";
            echo "</form>";
            echo "<br/>";
            echo "<br/>";
        }


    } else {//ログインしていない時
        $msg = 'ログインしていません';
        echo $msg . "<br/>" . "<br/>";
        $link = '<a href="login_form2.php">ログイン</a>';
        echo $link;
    }
    ?>


</body>