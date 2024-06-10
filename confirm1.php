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

<?php
    function escape($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
?>

<form action="thanks1.php" method="POST">
    <h2>確認画面</h2>
    会社名：
    <?php echo htmlspecialchars(isset($_POST['company']) ? $_POST['company'] : '未入力', ENT_QUOTES, "UTF-8"); ?><br>
    お名前：
    <?php echo htmlspecialchars(isset($_POST['name']) ? $_POST['name'] : '未入力', ENT_QUOTES, "UTF-8"); ?><br>
    メールアドレス：
    <?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '未入力', ENT_QUOTES, "UTF-8"); ?><br>
    お問い合わせ種別：
    <?php echo htmlspecialchars(isset($_POST['type']) ? $_POST['type'] : '未入力', ENT_QUOTES, "UTF-8"); ?><br>
    お問い合わせ内容：
    <?php echo htmlspecialchars(isset($_POST['content']) ? $_POST['content'] : '未入力', ENT_QUOTES, "UTF-8"); ?><br>

    <input type="submit" name="btn_submit" value="送信する">

    <input type="hidden" name="company" value="<?php echo isset($_POST['company']) ? escape($_POST['company']) : ''; ?>">
    <input type="hidden" name="name" value="<?php echo isset($_POST['name']) ? escape($_POST['name']) : ''; ?>">
    <input type="hidden" name="email" value="<?php echo isset($_POST['email']) ? escape($_POST['company']) : ''; ?>">
    <input type="hidden" name="type" value="<?php echo isset($_POST['type']) ? escape($_POST['type']) : ''; ?>">
    <input type="hidden" name="content" value="<?php echo isset($_POST['content']) ? escape($_POST['content']) : ''; ?>">
</form>

</body>
</html>