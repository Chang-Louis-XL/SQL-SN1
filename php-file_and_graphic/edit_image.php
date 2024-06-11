<?php
include_once "db.php";
$image = find('images', $_GET['id']);

if (!empty($_FILES)) {
    // $img['name'] 表達式從 $img 變量中提取圖像文件名
    unlink("images/" . $image['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name'])) {
        // 更新圖像信息：更新 $image 變量中的圖像名稱、類型和大小。
        // 在 $_FILES['file'] 數組中，每個鍵代表上傳文件的一個特定方面：
        // name：上傳文件的原始文件名。
        // type：上傳文件的 MIME 類型，例如 "image/jpeg" 或 "application/pdf"。
        // size：上傳文件的大小（以字節為單位）。
        // tmp_name：上傳文件在服務器上的臨時文件名。
        // error：指示上傳過程期間發生的任何錯誤的錯誤代碼。
        $image['name'] = $_FILES['file']['name'];
        $image['type'] = $_FILES['file']['type'];
        $image['size'] = $_FILES['file']['size'];
        // 使用 save 函數將更新的圖像信息保存到數據庫中的 'images' 表中。
        save("images", $image);
        header("location:upload.php");
    } else {
        echo "檔案上傳失敗";
    }
}

?>

<!-- 建立你的表單及設定編碼 -->
<form action="edit_image.php?id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="上傳">
</form>

<?php
echo "<img src='images/{$image['name']}'>";
?>
