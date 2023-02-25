<body>
    <?php
    //code php 1

    $id = $_GET['id_mk'];
    $sql = $con->prepare("SELECT * FROM matakuliah Where id_mk=?");
    $sql->bindParam(1, $id);
    $sql->execute();
    $r = $sql->fetch(PDO::FETCH_BOTH)
    ?>

    <h1 align="center">Edit Matakuliah</h1>
    <form action="index.php?page=save_matakuliah" method="POST">
        <label for="">Id Matakuliah : </label><br>
        <input type="text" name="id_mk" placeholder="Masukan Id Mata Kuliah" readonly value="<?= $r[0]; ?>" onclick="alert('Id tidak Bisa Diganti')"><br>
        <label for="">Nama Matakuliah : </label><br>
        <input type="text" name="nama_mk" placeholder="Masukan Nama Mata Kuliah" required="" value="<?php echo "$r[1]" ?>"><br>
        <label for="">SKS : </label><br>
        <input type="text" name="sks" placeholder="Masukan Sks" required="" value="<?php echo "$r[2]" ?>"><br>
        <label for="">Semester : </label><br>
        <input type="text" name="semester" placeholder="Masukan Semester" required="" value="<?php echo "$r[3]" ?>"><br>
        <label for="">Kode Jurusan : </label><br>
        <select name=kode_jur>

            <?php
            //code php 2
            $jur = $con->prepare("SELECT * FROM jurusan");
            $jur->execute();
            while ($j = $jur->fetch()) {
                $selected = "";
                if ($r[4] == $j[0]) {
                    $selected = "selected";
                }
                echo "<option value='$j[0]' $selected> $j[1] </option>";
            }

            ?>
        </select>
        <button type="submit">Update</button>
    </form>
</body>