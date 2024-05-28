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
    <?php
    if (isset($_GET['error'])) {
        echo "<span style='color:red'>";
        echo $_GET['error'];
        echo "</span>";
    }

    ?>
    <form action="save.php" method='post'>
        <div>
            <label for="school_num">學號：</label>
            <?php
            // ::FETCH_ASSOC 是 PHP 中 PDO (PHP Data Objects) 常量 PDO::FETCH_ASSOC 的簡寫表示方法。這個常量用於指定從數據庫查詢結果中提取的數據應該以關聯數組（associative array）的形式返回。
            // 具體來說，當你使用 PDOStatement 對象的 fetch 或 fetchAll 方法時，你可以使用 PDO::FETCH_ASSOC 來指定返回的數據格式。
            $max = $pdo->query("select max(`school_num`) as 'max' from `students`")->fetch(PDO::FETCH_ASSOC);
            // $max['max'] 的作用是從 $max 這個關聯數組中取出名為 'max' 的鍵所對應的值。
            echo $max['max'] + 1;
            ?>
            <input type="hidden" min='1' name="school_num" id="school_num" value='<?= $max['max'] + 1; ?>'>
        </div>
        <div>
            <label for="name">姓名：</label><input type="text" name="name" id="name">
        </div>
        <div>
            <label for="birthday">生日</label><input type="date" name="birthday" id="birthday">
        </div>
        <div>
            <label for="uni_id">身份證號</label><input type="text" name="uni_id" id="uni_id">
        </div>
        <div>
            <label for="addr">地址</label><input type="text" name="addr" id="addr">
        </div>
        <div>
            <label for="parents">父母</label><input type="text" name="parents" id="parents">
        </div>
        <div>
            <label for="tel">電話</label><input type="text" name="tel" id="tel">
        </div>
        <div>
            <label for="dept">科系</label>
            <select name="dept" id="dept">
                <?php
                $depts = $pdo->query('select * from dept')->fetchAll();
                foreach ($depts as $dept) {
                    echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                }
                ?>

            </select>
        </div>
        <div>
            <label for="graduate_at">畢業學校</label>
            <select name="graduate_at" id="graduate_at">
                <?php
                $schools = $pdo->query('select * from graduate_school')->fetchAll();
                foreach ($schools as $school) {
                    echo "<option value='{$school['id']}'>{$school['county']}{$school['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="status_code">畢業狀態</label>
            <select name="status_code" id="status_code">
                <option value="001">畢業</option>
                <option value="002">補校</option>
                <option value="003">補結</option>
                <option value="004">結業</option>
            </select>
        </div>

        <input type="submit" value="新增"><input type="reset" value="重置">

    </form>

</body>

</html>