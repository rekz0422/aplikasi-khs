<?php
//save_update nilai

$ID_NILAI = filter_var($_POST['id_nilai'], FILTER_SANITIZE_STRING);
$NIM = filter_var($_POST['nim'], FILTER_SANITIZE_STRING);
$KODE_MK = filter_var($_POST['kode_mk'], FILTER_SANITIZE_STRING);
$UTS = filter_var($_POST['uts'], FILTER_SANITIZE_STRING);
$UAS = filter_var($_POST['uas'], FILTER_SANITIZE_STRING);
$TUGAS = filter_var($_POST['tugas'], FILTER_SANITIZE_STRING);
$NID = filter_var($_POST['dosen'], FILTER_SANITIZE_STRING);

if (empty($ID_NILAI)) {
    echo "<script>
                alert('Data Harus Dilengkapi');
                window.location.href ='index.php?page=nilai';
        </script>";
} else {
    $sql = $con->prepare("SELECT * FROM nilai WHERE ID_NILAI = ?");
    $sql->bindParam(1, $ID_NILAI);
    $sql->execute();
    $row = $sql->rowCount();

    if ($row > 0) {
        $sql = $con->prepare("UPDATE nilai Set NIM = ?, KODE_MK=?, UTS=?, UAS=?, TUGAS=?, NID=? WHERE ID_NILAI = ?");
        $sql->bindParam(1, $NIM);
        $sql->bindParam(2, $KODE_MK);
        $sql->bindParam(3, $UTS);
        $sql->bindParam(4, $UAS);
        $sql->bindParam(5, $TUGAS);
        $sql->bindParam(6, $NID);
        $sql->bindParam(7, $ID_NILAI);
        $sql->execute();
        echo "<script>
                alert('$row Data Berhasil DiUpdate');
                window.location.href = 'index.php?page=nilai';
            </script>";
    } else {

        $sql = $con->prepare("INSERT INTO nilai VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $ID_NILAI);
        $sql->bindParam(2, $NIM);
        $sql->bindParam(3, $KODE_MK);
        $sql->bindParam(4, $UTS);
        $sql->bindParam(5, $UAS);
        $sql->bindParam(6, $TUGAS);
        $sql->bindParam(7, $NID);
        $sql->execute();
        $row = $sql->rowCount();
        echo "<script>
                        alert('$row Data Berhasil Ditambahkan');
                        window.location.href = 'index.php?page=nilai';
                </script>";
    }
}
