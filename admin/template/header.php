<?php 
session_start();
require_once __DIR__ .'/../../config/app.php'; 

?>

<!DOCTYPE html>
<html dir="<?php echo $config['dir'] ?>"lang="<?php echo $config['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?php echo $config['app_url'] ?>template/style.css">

<script type="text/javascript" src="template/shoper.js"></script>


    <title><?php echo $config['app_name'] . " | " . $title ?></title>
</head>
<body>

<header class="header">
<div class="navbar">
    <a href="contact.php">تواصل</a>
    <a href="">المنتجات</a>
    <a href="">الخدمات</a>
    <form class="form-style" action="">
        <input type="text"  placeholder="البحث هنا"  name="" id="">
        <input class="btn-outline" type="submit" value="بحث">
    </form>

</div>
    <div class="progress-container">
        <div id="progress-bar"></div>
    </div>
</header>

<section class="content-main">
    
