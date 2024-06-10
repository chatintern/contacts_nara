<?php 
header("X-Frame-Options: DENY");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>お問い合わせ内容の編集</title>
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
        echo "<form id='session_id' action='index.php' method='post'>";
        echo "<input type='hidden' name='before_session_id' value='". $session_id . "'>";
        echo "<button type='submit'>お問い合わせ一覧に戻る</button>";
        echo "</form>";

        $dsn = "mysql:host=localhost; dbname=inquiryform; charset=utf8";
        $user = 'root';
        $password = '';
    
        try{
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        $stmt = $dbh->prepare('SELECT content, memo FROM inquiry WHERE id = :id');
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT); 
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $content = escape($result['content']);
        $memo = escape($result['memo']);


    } else {//ログインしていない時
        $msg = 'ログインしていません';
        echo escape($msg) . "<br/>" . "<br/>";
        $link = '<a href="login_form2.php">ログイン</a>';
        echo $link;
    }

    ?>

<?php if(isset($_SESSION['id'])): ?>
    <form action="edit_process.php" method="POST">
        <h2>編集画面</h2>
        <div>
            <label for="content">お問い合わせ内容：</label>
            <textarea id="content" name="content"><?php echo $content; ?></textarea>
        </div>
        <div>
            <label for="memo">メモ：</label>
            <textarea id="memo" name="memo"><?php echo $memo; ?></textarea>
        </div>
        <div>
            <input type="submit" name="btn_submit" value="送信する">
        </div>
        <div>
        
            <input type="hidden" name="id" value="<?php echo escape($_POST['id']); ?>">
        </div>
        <div>
            <input type='hidden' name='before_session_id' value='<?php echo $session_id  ?>'>
        </div>
    </form>
<?php endif; ?>

</body>
    
</html>