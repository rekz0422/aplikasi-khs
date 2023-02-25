<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
        @import url(style.css);
    </style>
    <!-- Bootstrap CSS -->
</head>

<body>

    <?php
    //code php 1

    $id = $_GET['id_khs'];
    $sql = $con->prepare("SELECT * FROM khs Where id_khs=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $r = $sql->fetch(PDO::FETCH_BOTH)
    ?>


    <h1>EDIT KHS</h1>
    <!-- aplikasi -->
    <div class="">
        <form action="?page=save_khs" method="POST">
            <label for="">ID KHS : </label><br>
            <input type="number" name="id_khs" placeholder="Masukan Nilai ID KS" value="<?php echo $r[0]; ?>" readonly onclick="alert('id tidak bisa di edit')">
            <label for="">Mata Kuliah : </label><br>
            <select name="nama_mk" id="">

                <?php
                //code php 2
                $mk = $con->prepare("SELECT * FROM matakuliah");
                $mk->execute();
                while ($mtakuliah = $mk->fetch()) {
                    $selected = "";
                    if ($r[1] == $mtakuliah[1]) {
                        $selected = "selected";
                    }
                    echo "<option value='$mtakuliah[1]' $selected> $mtakuliah[1] </option>";
                }

                ?>

            </select><br>
            <label for="">SKS : </label><br>
            <input type="number" name="sks" placeholder="Masukan Nilai SKS" required="" value="<?php echo "$r[2]" ?>"><br>
            <label for="">GRADE : </label><br>
            <select name="grade" id="">

                <?php
                //code php 3

                $grade = $con->prepare("SELECT * FROM grade");
                $grade->execute();
                while ($g = $grade->fetch()) {
                    $selected = "";
                    if ($r[3] == $g[2]) {
                        $selected = "selected";
                    }
                    echo "<option value='$g[2]' $selected> $g[1] </option>";
                }

                ?>

            </select><br />
            <button type="submit">Update</button><br />
        </form>
    </div>
    <!-- aplikasi end -->
    <!-- KHS -->
    <h1>Data KHS</h1>
    <table>
        <tr>
            <th>ID KHS</th>
            <th>MATAKULIAH</th>
            <th>SKS</th>
            <th>GRADE</th>
            <th>SKS x GRADE</th>
            <th>AKSI</th>
            </th>
        </tr>

        <?php
        //kode php 4

        // $sql = $con->query("SELECT m.*, n.* , mk.*, d.* FROM nilai n INNER JOIN mahasiswa m ON m.NIM = n.NIM INNER JOIN matakuliah mk ON mk.id_mk = n.KODE_MK INNER JOIN dosen d ON d.NID = n.NID");
        $sql = $con->prepare("SELECT * FROM khs");
        $sql->execute();
        while ($r = $sql->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>
                <td>$r[0]</td>
                <td>$r[1]</td>
                <td>$r[2]</td>
                <td>$r[3]</td>
                <td>$r[4]</td>
                <td><a href='index.php?page=#i&id=$r[0]' onclick='return confirm(\"apakah anda yakin mengedit data dengan id = $r[0] ?\");'>Edit</a>
                <a href='?page=delete_khs&id_khs=$r[0]' onclick='return confirm(\"apakah anda yakin menghapus data dengan id = $r[0] ?\");'>Delete</a>
                </td>
            </tr>";
        }

        $sum = $con->prepare("SELECT SUM(sks) tot_sks FROM khs");
        $sum->execute();
        while ($t = $sum->fetch(PDO::FETCH_BOTH)) {
            $sks = $t[0];
        }
        $sum = $con->prepare("SELECT SUM(total_nilai_bobot) bobot FROM khs");
        $sum->execute();
        while ($t = $sum->fetch(PDO::FETCH_BOTH)) {
            $bobot = $t[0];
        }
        $ip = $bobot / $sks;

        ?>

        <tr>
            <td colspan=4>Total SKS <br />Indeks Prestasi</td>
            <td colspan=2><?php echo "{$sks}" ?><br /><?php echo "{$ip}" ?> </td>
        </tr>

    </table><br>

</body>

</html>