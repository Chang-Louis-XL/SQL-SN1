<?php
include_once "db.php";
$image = find('images', $_GET['id']);

if (!empty($_FILES)) {
    unlink("images/" . $image['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name'])) {
        $image['name'] = $_FILES['file']['name'];
        $image['type'] = $_FILES['file']['type'];
        $image['size'] = $_FILES['file']['size'];
        save("images", $image);
        header("location:upload.php");
    } else {
        echo "檔案上傳失敗";
    }
}
?>
<!----建立你的表單及設定編碼----->
<form action="edit_image.php?id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="上傳">
</form>

<?php
echo "<img src='images/{$image['name']}'>";
?>