<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');


// 遍歷 POST 數組，檢查是否有空值
foreach ($_POST as $i => $item) {
    echo $i . '->' . $item;
    echo "<br>";
    if ($item == null || $item == '') { // 如果 POST 中有空值
        echo "空值";
        header("location:insert.php?error=欄位不可為空"); // 重定向到 insert.php，並附帶錯誤信息
        exit(); // 結束腳本運行
    }
}

// 準備 SQL 語句，將 POST 數據插入到數據庫表中
$sql = "insert into students ( `school_num`, `name`, `birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`, `graduate_at`, `status_code` )
            values('{$_POST['school_num']}', 
                   '{$_POST['name']}', 
                   '{$_POST['birthday']}', 
                   '{$_POST['uni_id']}', 
                   '{$_POST['addr']}', 
                   '{$_POST['parents']}', 
                   '{$_POST['tel']}', 
                   '{$_POST['dept']}', 
                   '{$_POST['graduate_at']}', 
                   '{$_POST['status_code']}')";
echo $sql;
// 執行 SQL 語句，並返回受影響的行數
echo $pdo->exec($sql);
header("location:index.php");
