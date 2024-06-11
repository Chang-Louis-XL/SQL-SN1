<?php 
include_once "db.php";
session_start();

if(!empty($_FILES)) {
    if (move_uploaded_file($_FILES['file']['tmp_name'],"images/" . $FILES['file']['name'])){
        $data['name'] = $_FILES['file']['name'];
        $data['type'] = $_FILES['file']['type'];
        $data['size'] = $_FILES['file']['size'];
        save("images",$data);
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
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">檔案上傳練習</h1>
<form action="upload.php" method="post">


</form>



    
</body>
</html>