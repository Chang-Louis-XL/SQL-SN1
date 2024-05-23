<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學員</title>
</head>

<body>
    <h1>新增學員</h1>

    <form action="save.php" method="post">
    <div>
        <label for="school_num">學號</label>
        <input type="text" name="school_num" id="school_num">
    </div>
    <div>
        <label for="name">姓名</label>
        <?php
        $max= $pdo->
        ?>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="birthday">生日</label>
        <input type="text" name="birthday" id="birthday">
    </div>
    <div>
        <label for="uni_id">身份證號</label>
        <input type="text" name="uni_id" id="uni_id">
    </div>
    <div>
        <label for="addr">地址</label>
        <input type="text" name="addr" id="addr">
    </div>
    <div>
        <label for="parents">父母</label>
        <input type="text" name="parents" id="parents">
    </div>
    <div>
        <label for="tel">電話</label>
        <input type="text" name="tel" id="tel">
    </div>
    <div>
        <label for="dept">科系</label>
        <input type="text" name="dept" id="dept">
    </div>
    <div>
        <label for="graduate_at">畢業學校</label>
        <input type="text" name="graduate_at" id="graduate_at">
    </div>
    <div>
        <label for="status_code">畢業狀態</label>
        <input type="text" name="status_code" id="status_code">
    </div>

    <input type="submit" value="新增">
    <input type="reset" value="重置">

    </form>
</body>

</html>