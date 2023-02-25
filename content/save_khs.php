<?php
    //save_update KHS

    $id_khs = filter_var($_POST['id_khs'], FILTER_SANITIZE_STRING);
    $sks = filter_var($_POST['sks'], FILTER_SANITIZE_STRING);
    $grade = filter_var($_POST['grade'], FILTER_SANITIZE_STRING);
    $mk = filter_var($_POST['nama_mk'], FILTER_SANITIZE_STRING);
    $a=intval($sks);
    $b=intval($grade);
    $tot_nil_bbt=$a*$b;

if (empty($sks))
    {
        echo "<script>
            alert('Data Harus Dilengkapi');
            window.location.href ='index.php?page=aplikasi_khs';
    </script>";
    }
    else
    {
        $sql = $con->prepare("SELECT * FROM khs WHERE id_khs = ?");
        $sql->bindParam(1, $id_khs);
        $sql->execute();
        $row = $sql->rowCount();
        if($row >= 1){
            $sql=$con->prepare( "UPDATE khs Set matakuliah = ?, sks = ?, grade = ?, total_nilai_bobot = ? WHERE id_khs = ?");
            $sql->bindParam(1,$mk);
            $sql->bindParam(2,$sks);
            $sql->bindParam(3,$grade);
            $sql->bindParam(4,$tot_nil_bbt);
            $sql->bindParam(5,$id_khs);
            $sql->execute();
            echo "<script>
                alert('$row Data Berhasil DiUpdate');
                window.location.href = '?page=aplikasi_khs';
            </script>";

        }		else{

            $sql = $con->prepare("INSERT INTO khs VALUES (?, ?, ?, ?, ?)");
            $sql->bindParam(1,$id_khs);
            $sql->bindParam(2,$mk);
            $sql->bindParam(3,$sks);
            $sql->bindParam(4,$grade);
            $sql->bindParam(5,$tot_nil_bbt);
            $sql->execute();
            $row = $sql->rowCount();
            echo "<script>
                    alert('$row Data Berhasil Ditambahkan');
                    window.location.href = 'index.php?page=aplikasi_khs';
            </script>";

            }
    }
