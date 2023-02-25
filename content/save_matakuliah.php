<?php
//save_update matakuliah

$id = filter_var($_POST['id_mk'], FILTER_SANITIZE_STRING);
$nama_mk = filter_var($_POST['nama_mk'], FILTER_SANITIZE_STRING);
$sks = filter_var($_POST['sks'], FILTER_SANITIZE_STRING);
$semester = filter_var($_POST['semester'], FILTER_SANITIZE_STRING);
$kode_jurusan = filter_var($_POST['kode_jur'], FILTER_SANITIZE_STRING);

if (empty($nama_mk) || empty($sks) || empty($semester) || empty($kode_jurusan)) {
    echo "<script>
            alert('Data Harus Dilengkapi');
            window.location.href ='index.php?page=matakuliah';
    </script>";
} else {
    $sql = $con->prepare("SELECT * FROM matakuliah WHERE id_mk = ?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $row = $sql->rowCount();
    if ($row > 0) {
        $sql = $con->prepare("UPDATE matakuliah Set nama_mk = ?, sks = ?, semester = ?, kode_jurusan = ? WHERE id_mk = ?");
        $sql->bindParam(1, $nama_mk);
        $sql->bindParam(2, $sks);
        $sql->bindParam(3, $semester);
        $sql->bindParam(4, $kode_jurusan);
        $sql->bindParam(5, $id);
        $sql->execute();
        echo "<script>
                alert('$row Data Berhasil DiUpdate');
                window.location.href = 'index.php?page=matakuliah';
            </script>";
    } else {

        $sql = $con->prepare("INSERT INTO matakuliah VALUES (?, ?, ?, ?, ?)");
        $sql->bindParam(1, $id);
        $sql->bindParam(2, $nama_mk);
        $sql->bindParam(3, $sks);
        $sql->bindParam(4, $semester);
        $sql->bindParam(5, $kode_jurusan);
        $sql->execute();
        $row = $sql->rowCount();
        echo "<script>
                        alert('$row Data Berhasil Ditambahkan');
                        window.location.href = 'index.php?page=matakuliah';
                </script>";
    }
}
