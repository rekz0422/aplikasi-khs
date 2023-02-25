<body>
    <h1 align="center">Master Nilai</h1>
    <form action="index.php?page=save_nilai" method="POST">
        <label for="">Id Nilai </label><br>
        <input type="text" name="id_nilai" placeholder="Masukan Id  Nilai " required=""><br>
        <label for="">Nama Mahasiswa </label><br>
        <select name="nim" id="">

            <?php
            //code php 1

            $sql = $con->prepare("SELECT * FROM mahasiswa");
            $sql->execute();
            while ($mhs = $sql->fetch()) {
                echo "<option value='$mhs[0]'>$mhs[1]</option>";
            }
            ?>

        </select><br>

        <label for="">Mata Kuliah : </label><br>
        <select name="kode_mk" id="">

            <?php
            //code php 2
            $sql = $con->prepare("SELECT * FROM matakuliah");
            $sql->execute();
            while ($mk = $sql->fetch()) {
                echo "<option value='$mk[0]'>$mk[1]</option>";
            }
            ?>

        </select><br>

        <label for="">UTS : </label><br>
        <input type="number" name="uts" placeholder="Masukan Nilai Uts" required=""><br>
        <label for="">UAS : </label><br>
        <input type="number" name="uas" placeholder="Masukan Nilai Uas " required=""><br>
        <label for="">Tugas : </label><br>
        <input type="number" name="tugas" placeholder="Masukan Nilai Tugas" required=""><br>

        <label for="">Nama Dosen</label><br>
        <select name="dosen" id="">

            <?php
            //code php 3
            $sql = $con->prepare("SELECT * FROM dosen");
            $sql->execute();
            while ($d = $sql->fetch()) {
                echo "<option value='$d[0]'>$d[1]</option>";
            }
            ?>

        </select><br>
        <button type="submit">Simpan</button>
    </form>
    <h1 align="Center">Data Nilai</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>ID NILAI</th>
                <th>NAMA</th>
                <th>MATA KULIAH</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>TUGAS</th>
                <th>DOSEN</th>
                <th>AKSI</th>
                </th>
            </tr>
            <?php
            //code php 4

            $sql = $con->query("SELECT m.*, n.* , mk.*, d.* FROM nilai n INNER JOIN mahasiswa m ON m.NIM = n.NIM INNER JOIN matakuliah mk ON mk.id_mk = n.KODE_MK INNER JOIN dosen d ON d.NID = n.NID");
            //$sql = $con->prepare("SELECT * FROM nilai");
            $sql->execute();
            while ($r = $sql->fetch(PDO::FETCH_BOTH)) {
                echo "<tr>
                    <td>$r[ID_NILAI]</td>
                    <td>$r[NAMA_MHS]</td>
                    <td>$r[nama_mk]</td>
                    <td>$r[UTS]</td>
                    <td>$r[UAS]</td>
                    <td>$r[TUGAS]</td>
                    <td>$r[NAMA_DOSEN]</td>
                    <td><a href='index.php?page=edit_nilai&id=$r[ID_NILAI]' onclick='return confirm(\"apakah anda yakin mengedit data $r[ID_NILAI] - $r[NAMA_MHS] ?\");'>Edit</a>
                    <a href='index.php?page=delete_nilai&id=$r[ID_NILAI]' onclick='return confirm(\"apakah anda yakin menghapus data  $r[ID_NILAI] - $r[NAMA_MHS] ?\");'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table><br>
    </div>
</body>