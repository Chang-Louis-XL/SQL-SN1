<?php
include_once "db.php";
session_start();
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

//  $_的相關內容，大部分為全域資訊，以及陣列型態，系統開始時就已經產生，如$_FILES。
if (!empty($_FILES)) {
    // ['file']跟著下面input的name,同樣名稱
    // echo "檔案名稱" . $_FILES['file']['name'] . "<br>";
    // echo "檔案類型" . $_FILES['file']['type'] . "<br>";
    // echo "檔案大小" . $_FILES['file']['size'] . "<br>";
    // echo "站存名稱" . $_FILES['file']['tmp_name'] . "<br>";
    


    // move_uploaded_file檔案搬移，確認檔案資訊是否正確，若正確搬移至images/。

    if (move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name'])) {
    
        $data['name'] = $_FILES['file']['name'];
        $data['type'] = $_FILES['file']['type'];
        $data['size'] = $_FILES['file']['size'];
        save("images", $data);
        echo "檔案上傳成功";
    } else {
        echo "檔案上傳失敗";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="header">檔案上傳練習</h1>
    <!----建立你的表單及設定編碼----->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="上傳">
    </form>




    <!----建立一個連結來查看上傳後的圖檔---->
    <?php

    
    $images = all('images');

    // foreach ($images as $image) {
    //     echo "<img src='images/{$image['name']}' class='upload-img'>";
    // }


    foreach ($images as $image) {
        echo "<div class='upload-img'>";
        echo "<a class='pen' href='edit_image.php?id={$image['id']}'><img src='./pen.png' style='width:15px;height:15px;'></a>";
        echo "<a class='del' href='del_image.php?id={$image['id']}'>X</a>";
        echo "<img src='images/{$image['name']}'>";
        echo "</div>";
    }

    ?>
 
</body>

</html>