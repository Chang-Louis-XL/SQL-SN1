<?php include_once "db.php";
// 它根據提供的 id 值從數據庫中的 'images' 表中檢索有關圖像的信息。$_GET['id'] 表達式可能從 URL 查詢字符串中檢索 id 值。
$img = find('images', $_GET['id']);
// unlink 函數將文件路徑作為參數，並從文件系統中刪除對應的文件。$img['name'] 表達式從 $img 變量中提取圖像文件名。
unlink("images/" . $img['name']);
// 刪除資料庫中的內容。
del('images', $_GET['id']);
// 指示它將用戶重定向到名為 "upload.php" 的頁面。
header("location:upload.php");
