<?php
$id = $_GET['id_khs'];
$sql = $con->prepare("DELETE FROM khs WHERE id_khs = ?");
$sql->bindParam(1, $id);
$sql->execute();
$row = $sql->rowCount();

echo "<script>
                alert('$row Data dengan ID = $id Berhasil Di hapus');
                window.location.href = 'index.php?page=aplikasi_khs';
        </script>";
