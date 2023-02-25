<?php
    try
    {
        //koneksi
        $con = new PDO('mysql:host=localhost;dbname=stikom', "root", "");
        //set error mode
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (PDOException $e)
    {
        //jika ada error
        echo "Koneksi Gagal : ". $e->getMessage() . "";
        die();
    }
