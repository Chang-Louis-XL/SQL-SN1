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

<!-- for 屬性：這個屬性通常用於 <label> 標籤，它指定了與標籤關聯的表單控件的 id 屬性。當用戶點擊標籤時，關聯的表單控件會自動聚焦或選中。在你提供的代碼中，for="height" 表示這個標籤與 id 為 height 的表單控件相關聯，這樣當用戶點擊 "身高:" 標籤時，就會聚焦到 ID 為 height 的表單控件，方便用戶輸入身高數值。

name 屬性：這個屬性用於表單控件，指定了控件的名稱，當表單被提交時，它的值將作為數據的一部分被發送到服務器端。在你提供的代碼中，name="height" 表示 <input> 元素的名稱為 height，當表單被提交時，這個名稱和用戶輸入的數值將一同發送到服務器端。

id 屬性：這個屬性用於給 HTML 元素指定一個唯一的識別符。通常，它被 JavaScript 用來選擇元素進行操作，或者用於 CSS 中進行樣式設定。在你提供的代碼中，id="height" 表示這個 <input> 元素的識別符為 height，這樣可以在 JavaScript 中通過  -->

<body>
    <h1>新增學員</h1>
    <?php
   if (isset($_GET['error'])) {
    echo "<span style='color:red'>";
    echo $_GET['error'];
    echo "</span>";
}

    ?>
    <form action="save.php" method="post">
        <div>
            <label for="school_num">學號</label>
            <?php
            $max = $pdo->query("select max(`school_num`)as 'max' from `students`")->fetch(PDO::FETCH_ASSOC);
            echo $max['max'] + 1;
            ?>
            <input type="hidden" min="1" name="school_num" id="school_num" value='<?= $max['max'] + 1; ?>'>
        </div>
        <div>
            <label for="name">姓名</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="birthday">生日</label>
            <input type="date" name="birthday" id="birthday">
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
            <select name="dept" id="dept">
                <?php
                $depts = $pdo->query('select * from dept')->fetchall();
                foreach ($depts as $dept) {
                    echo "<option value='{$depts['id']}'>{$dept['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="graduate_at">畢業學校</label>
            <select name="graduate_at" id="graduate_at">
                <?php
                $schools = $pdo->query('select * from graduate_school')->fetchall();
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

        <input type="submit" value="新增">
        <input type="reset" value="重置">

    </form>
</body>

</html>