<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

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
// echo $sql;
// 如果正確回傳1若不正確回傳0
echo $pdo->exec($sql);

// header("location:index.php");











