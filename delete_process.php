<?php 
header("X-Frame-Options: DENY");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせ内容の削除</title>
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

        $dsn = "mysql:host=localhost; dbname=inquiryform; charset=utf8";
        $user = "root";
        $password = "";

        try{
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        $sql = 'DELETE FROM inquiry WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT); 
        $stmt->execute();

        echo "削除しました。". "<br/>" . "<br/>";
        echo "<form id='session_id' action='index.php' method='post'>";
        echo "<input type='hidden' name='before_session_id' value='". $session_id . "'>";
        echo "<button type='submit'>お問い合わせ一覧</button>";
        echo "</form>";


    } else {//ログインしていない時
        $msg = 'ログインしていません';
        echo $msg . "<br/>" . "<br/>";
        $link = '<a href="login_form2.php">ログイン</a>';
        echo $link;
    }
    ?>

</body>
    
</html>