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
</head>

<body>
    <h1>UTS SEMESTER 5</h1>

    <div class="">
        <form action="?page=save_khs" method="POST">
            <label for="">ID KHS : </label><br>
            <input type="number" name="id_khs" placeholder="Masukan Nilai ID KS" required=""><br>
            <label for="">Mata Kuliah : </label><br>
            <select name="nama_mk" id="">

                <?php
                //code php 1
                $sql = $con->prepare("SELECT * FROM matakuliah");
                $sql->execute();
                while ($mk = $sql->fetch()) {
                    echo "<option value='$mk[1]'>$mk[1]</option>";
                }
                ?>

            </select><br>
            <label for="">SKS : </label><br>
            <input type="number" name="sks" placeholder="Masukan Nilai SKS" required=""><br>
            <label for="">GRADE : </label><br>
            <select name="grade" id="">

                <?php
                //code php 2
                $sql = $con->prepare("SELECT * FROM grade");
                $sql->execute();
                while ($g = $sql->fetch()) {
                    echo "<option value='$g[2]'>$g[1]</option>";
                }
                ?>

            </select><br />
            <button type="submit">Simpan</button><br />
        </form>
    </div>

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
        //code php 3
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
                    <td><a href='?page=edit_khs&id_khs=$r[0]' onclick='return confirm(\"apakah anda yakin mengedit data dengan id = $r[0] ?\");'>Edit</a>
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
            <td colspan=2><?php echo "{$sks}" ?><br /><?php echo "{$ip}" ?></td>
        </tr>
    </table><br>
</body>

</html>