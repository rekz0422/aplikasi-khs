<?php

$id = $_GET['id_mk'];
$sql = $con->prepare("DELETE FROM matakuliah WHERE id_mk = ?");
$sql->bindParam(1, $id);
$sql->execute();
$row = $sql->rowCount();

echo "<script>
alert('$row Data dengan ID = $id Berhasil Di hapus');
window.location.href = 'index.php?page=matakuliah';
</script>";
