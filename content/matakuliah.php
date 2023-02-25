<body>
    <h1 align=" center">Master Matakuliah</h1><br />

    <form action="index.php?page=save_matakuliah" method="POST">
        <label for="">Id Matakuliah : </label><br>
        <input type="text" name="id_mk" placeholder="Masukan Id Mata Kuliah" required=""><br>
        <label for="">Nama Matakuliah : </label><br>
        <input type="text" name="nama_mk" placeholder="Masukan Nama Mata Kuliah" required=""><br>
        <label for="">SKS : </label><br>
        <input type="text" name="sks" placeholder="Masukan Sks" required=""><br>
        <label for="">Semester : </label><br>
        <input type="text" name="semester" placeholder="Masukan Semester" required=""><br>
        <label for="">Jurusan : </label><br>
        <select name=kode_jur>

            <?php
            //code php 1

            $sql = $con->query("SELECT * FROM jurusan");
            while ($d = $sql->fetch()) {
                echo "<option value='$d[0]'>$d[1]</option>";
            }

            ?>

        </select>
        <button type="submit">Simpan</button>
    </form>


    <h1 align="Center">Data Mata Kuliah</h1>
    <table>
        <tr>
            <th>ID MK</th>
            <th>NAMA MK</th>
            <th>SKS</th>
            <th>SEMESTER</th>
            <th>JURUSAN</th>
            <th>AKSI</th>
        </tr>
        <?php
        //code php 2
        $sql = $con->query("SELECT j.*, mk.* FROM matakuliah mk INNER JOIN jurusan j ON j.kode_jurusan = mk.kode_jurusan");
        //$sql = $con->prepare("SELECT * FROM matakuliah");
        $sql->execute();
        while ($r = $sql->fetch(PDO::FETCH_BOTH)) {
            echo "<tr>
                    <td>$r[id_mk]</td>
                    <td>$r[nama_mk]</td>
                    <td>$r[sks]</td>
                    <td>$r[semester]</td>
                    <td>$r[nama_jurusan]</td>
                    <td><a href='index.php?page=edit_matakuliah&id_mk=$r[id_mk]' onclick='return confirm(\"apakah anda yakin mengedit data $r[id_mk] - $r[nama_mk] ?\");'>Edit</a>
                    <a href='index.php?page=delete_matakuliah&id_mk=$r[id_mk]' onclick='return confirm(\"apakah anda yakin menghapus data   $r[id_mk] - $r[nama_mk] ?\");'>Delete</a>
                    </td>
                </tr>";
        }
        ?>


    </table><br>

</body>