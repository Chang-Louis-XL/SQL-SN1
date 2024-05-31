<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

foreach ($_POST as $i => $item) {
    if ($item == null || $item == '') {
        header("location:edit.php?id={$_POST['id']}&error=欄位不可為空");
        exit();
    }
}
$cols = [];
// 反引號 `` 用於引用列名或表名，這在 SQL 查詢中是有效的。引用列名或表名有助於避免與 SQL 保留字或關鍵字的衝突。`age`='30'
foreach ($_POST as $key => $value) 
    
        $cols[] = "`$key`='$value'";
    


$sql = "UPDATE `students` SET " . join(",", $cols) . " WHERE `id`='{$_POST['id']}'";

echo $sql;
echo "<br>";
print_r($cols);
// echo $pdo->exec($sql);

// header("location:index.php");
