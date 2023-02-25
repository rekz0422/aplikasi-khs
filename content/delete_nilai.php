<?php

    $id_nilai = $_GET['id'];
    $sql = $con->prepare("DELETE FROM nilai WHERE ID_NILAI = ?");
    $sql->bindParam(1, $id_nilai);
    $sql->execute();

    echo "<script>
                alert('Data dengan id = $id_nilai Berhasil Di hapus');
                window.location.href = 'index.php?page=nilai';
        </script>";
