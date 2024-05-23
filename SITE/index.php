<style>
    table {
        border-collapse: collapse;

    }

    td {
        padding: 5px 10px;
        border: 1px solid #999;
    }
</style>
<a href="insert.php">新增學員</a>

<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');

$sql = "SELECT * FROM `students` where `id` < 30 ";
$db = $pdo->query($sql);
// query查詢、fetch抓取
$rows = $db->fetchAll();

// echo "<pre>";
// print_r($rows);
// echo "</pre>"


// if (!empty($rows)) {
//     echo '<table border="1">';
//     echo '<tr>';

    // 使用陣列的第一個元素來生成表格的表頭
//     foreach ($rows[0] as $header => $value) {
//         echo '<th>' . htmlspecialchars($header) . '</th>';
//     }
//     echo '</tr>';

    // 輸出每一行的數據
//     foreach ($rows as $row) {
//         echo '<tr>';
//         foreach ($row as $cell) {
//             echo '<td>' . htmlspecialchars($cell) . '</td>';
//         }
//         echo '</tr>';
//     }

//     echo '</table>';
// } else {
//     echo 'No data available.';
// }

echo "<table>";
echo "<tr>";
echo "<td>id</td>";
echo "<td>學號</td>";
echo "<td>姓名</td>";
echo "<td>生日</td>";
echo "<td>身份證號</td>";
echo "<td>地址</td>";
echo "<td>父母</td>";
echo "<td>電話</td>";
echo "<td>科系</td>";
echo "<td>畢業學校</td>";
echo "<td>畢業狀態</td>";
echo "</tr>";
foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['school_num']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['birthday']}</td>";
    echo "<td>{$row['uni_id']}</td>";
    echo "<td>{$row['addr']}</td>";
    echo "<td>{$row['parents']}</td>";
    echo "<td>{$row['tel']}</td>";
    echo "<td>{$row['dept']}</td>";
    echo "<td>{$row['graduate_at']}</td>";
    echo "<td>{$row['status_code']}</td>";
    echo "</tr>";
}

echo "</table>";


?>