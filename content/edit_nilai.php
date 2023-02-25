<body>

    <?php
    //code php 1

    $id = $_GET['id'];
    $sql = $con->prepare("SELECT * FROM nilai Where id_nilai=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $r = $sql->fetch(PDO::FETCH_BOTH)

    ?>

    <h1 align="center">Edit Nilai</h1>
    <form action="index.php?page=save_nilai" method="POST">
        <label for="">Id Nilai </label><br>
        <input type="text" name="id_nilai" placeholder="Masukan Id  Nilai " readonly onclick="alert('Id Nilai tak bisa di Edit ! ')" value="<?php echo "$r[0]" ?>"><br>
        <label for="">Nama Mahasiswa </label><br>
        <select name="nim" id="">

            <?php
            //code php 2
            $mhs = $con->prepare("SELECT * FROM mahasiswa");
            $mhs->execute();
            while ($mhasiswa = $mhs->fetch()) {
                $selected = "";
                if ($r[1] == $mhasiswa[0]) {
                    $selected = "selected";
                }
                echo "<option value='$mhasiswa[0]' $selected> $mhasiswa[1] </option>";
            }
            ?>

        </select><br>

        <label for="">Mata Kuliah : </label><br>
        <select name="kode_mk" id="">

            <?php
            //code php 3

            $mk = $con->prepare("SELECT * FROM matakuliah");
            $mk->execute();
            while ($mtakuliah = $mk->fetch()) {
                $selected = "";
                if ($r[2] == $mtakuliah[0]) {
                    $selected = "selected";
                }
                echo "<option value='$mtakuliah[0]' $selected> $mtakuliah[1] </option>";
            }
            ?>

        </select><br>
        <label for="">UTS : </label><br>
        <input type="number" name="uts" placeholder="Masukan Nilai Uts" required="" value="<?php echo "$r[3]" ?>"><br>
        <label for="">UAS : </label><br>
        <input type="number" name="uas" placeholder="Masukan Nilai Uas " required="" value="<?php echo "$r[4]" ?>"><br>
        <label for="">Tugas : </label><br>
        <input type="number" name="tugas" placeholder="Masukan Nilai Tugas" required="" value="<?php echo "$r[5]" ?>"><br>
        <label for="">Nama Dosen</label><br>
        <select name="dosen" id="">
            <?php
            //code php 4

            $dosen = $con->prepare("SELECT * FROM dosen");
            $dosen->execute();
            while ($d = $dosen->fetch()) {
                $selected = "";
                if ($r[6] == $d[0]) {
                    $selected = "selected";
                }
                echo "<option value='$d[0]' $selected> $d[1] </option>";
            }
            ?>

        </select><br>
        <button type="submit">Update</button>
    </form>
</body>