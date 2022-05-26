<?php
global $title;

if($title=="categories.php"){
    $arr=['dashboard'];
    $aStyle=array(
    "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>",
    "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>",
    "<script src='ttps://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>",
    "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>"
    );
}else if($title=="dashboard.php"){
    $arr=['dashboard'];
}elseif($title="index.php"){
    $arr=['custom'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style all css and head tags -->
<?php require "style.php";?>
</head>
<body>