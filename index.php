<?php
require_once 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Data Object</title>
    <style type="text/css">
        @import url(content/style.css);
    </style>
</head>

<body>
    <nav>
        <a href="?page=aplikasi_khs">UTS</a>
        <a href="?page=nilai">NILAI</a>
        <a href="?page=matakuliah">MATAKULIAH</a>
    </nav>

    <div class="container">

        <?php
        $direktori = "content";
        $page = @$_GET['page'];

        if ($page != "")
            include("$direktori/$page.php");
        else
            include("$direktori/home.php");
        ?>

    </div>
</body>

</html>