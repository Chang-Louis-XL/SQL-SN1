<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=files";
$pdo = new PDO($dsn, 'root', '');

session_start();

function save ($table , $array){
    if(isset($array['id'])){
        update($table,$array,$array['id']);
    }else {
        insert($table,$array);
    }
}


function update($table,$key,$value) {

}


if (!empty($_FILES)) {

    if (move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name']))
    $data['name'] = $_FILES['file']['name'];
    $data['type'] = $_FILES['file']['type'];
    $data['size'] = $_FILES['file']['size'];
    save('images', $data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>檔案上傳</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>



    </body>

</html>