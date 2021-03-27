<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;

        }

        table,
        th,
        td {
            border: 2px solid black;


        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: cornflowerblue;
            color: white;
        }

        .t_output {
            text-align: center;
        }

        .judul {
            font-weight: bold;
            font-family: sans-serif;
        }

        h2 {
            margin-bottom: -70px;
            margin-top: 10%;
            background-color: cornflowerblue;
            border-radius: 10px;
            color: white;

        }

        .header {
            width: 50%;
        }

        .container {
            width: 50%;
            margin-top: 12%;

        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <center>
        <div class="container">
            <div class="header">
                <h2>Form Pendataan Mahasiswa</h2>
                <form action="" method="POST" name="input">
            </div>

            <table class="table1">
                <!-- Table nim -->
                <tr>
                    <td class="judul">Nim</td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <br>
                <!-- Tabel program studi -->
                <tr>
                    <td class="judul">Program Studi</td>
                    <td><select name="program_studi">
                            <option value="">...</option>
                            <option value="Teknik Informatika S1">A11</option>
                            <option value="Sistem Informasi S1">A12</option>
                            <option value="Teknik Informatika D3">A22</option>
                    </td>
                    </select>
                </tr>
                <br>
                <!-- Tabel nilai tugas -->
                <tr>
                    <td class="judul">Nilai Tugas</td>
                    <td><input type="number" min="0" max="100" name="nilai_tugas"></td>
                </tr>
                <br>
                <!-- Tabel nilai uts -->
                <tr class="judul">
                    <td>Nilai UTS</td>
                    <td><input type="number" min="0" max="100" name="nilai_uts"></td>
                </tr>
                <br>
                <!-- tabel nilai uas -->
                <tr class="judul">
                    <td>Nilai UAS</td>
                    <td><input type="number" min="0" max="100" name="nilai_uas"></td>
                </tr>
                <br>
                <!-- Tabel catatan khusus -->
                <tr>
                    <td class="judul">Catatan Khusus</td>
                    <td>
                        <?php
                        $catatan = ['Kehadiran >= 70%', 'Interaktif dikelas', 'Tidak terlambat mengumpulkan tugas'];
                        ?>
                        <?php
                        $total = count($catatan);
                        for ($a = 0; $a < $total; $a++) {
                            echo "<br>";
                            echo "<label><input type='checkbox' name='ck[]' value='$catatan[$a]'>" . ucfirst($catatan[$a]) . "</label>";
                        }
                        ?>
                    </td>

                </tr>
                <!-- Submit button -->
                <tr>
                    <td></td>
                    <td><input type="submit" style="color:white;font-family:sans;background-color:cornflowerblue;border: 1px solid black;border-radius:5px;" name="simpan" value="SIMPAN">
                    </td>
                </tr>
                <br>
                <table class="table1">
                    <!-- Tabel output -->
                    <tr>
                        <th>Program Studi</td>
                        <th>NIM</td>
                        <th>Nilai Akhir</td>
                        <th>STATUS</td>
                        <th>Catatan Khusus</td>
                    </tr>
                    <br>
                    <!-- Function menghitung nilai akhir -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        function nilaiakhir($tu = 0, $ut = 0, $ua = 0)
                        {
                            $akhir = 0;
                            $akhir = $tu * 0.40 + $ut * 0.30 + $ua * 0.30;
                            return $akhir;
                        }

                        $tugas =  $_POST['nilai_tugas'];
                        $uts = $_POST['nilai_uts'];
                        $uas = $_POST['nilai_uas'];
                        $akhir1 = nilaiakhir($tugas, $uts, $uas);
                    }
                    ?>
                    <tr>
                        <!-- Tabel output program studi -->
                        <td>
                            <?php
                            if (isset($_POST['simpan'])) {
                                if (empty($_POST['program_studi'])) {
                                    echo "Pilih program studi";
                                } else {
                                    $ps = $_POST['program_studi'];
                                    echo "$ps";
                                }
                            }

                            ?>
                        </td>
                        <!-- Tabel output nama -->
                        <td>
                            <?php
                            if (isset($_POST['simpan'])) {
                                if (empty($_POST['nim'])) {
                                    echo "Masukkan nim";
                                } else {
                                    $nim = $_POST['nim'];
                                    echo "$nim";
                                }
                            }
                            ?>
                        </td>
                        <!-- Tabel output nilai akhir -->
                        <td class="t_output">
                            <?php
                            if (isset($_POST['simpan'])) {
                                if ($akhir1 <= 100 && $akhir1 >= 85) {
                                    $status = "<b>" . "LULUS";
                                    echo "A";
                                }
                                if ($akhir1 <= 84 && $akhir1 >= 70) {
                                    $status = "<b>" . "LULUS";
                                    echo "B";
                                }
                                if ($akhir1 <= 69 && $akhir1 >= 60) {
                                    $status = "<b>" . "LULUS";
                                    echo "C";
                                }
                                if ($akhir1 <= 59 && $akhir1 >= 50) {
                                    $status = "<b>" . "TIDAK LULUS";
                                    echo "D";
                                }
                                if ($akhir1 <= 50  && $akhir1 >= 0) {
                                    $status = "<b>" . "TIDAK LULUS";
                                    echo "E";
                                }
                            }
                            ?>

                        </td>
                        <!-- Tabel output status -->
                        <td class="t_output">
                            <?php
                            if (isset($_POST['simpan'])) {
                                echo $status;
                            }
                            ?>
                        </td>
                        <!-- Tabel output catatan khusus -->
                        <td>
                            <?php
                            if (isset($_POST['simpan'])) {
                                if (empty($_POST['ck'])) {
                                    echo "Tidak ada catatan khusus";
                                } else {
                                    $hc = $_POST['ck'];
                                    for ($b = 0; $b < count($hc); $b++) {
                                        echo $hc[$b] . "<br>";
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    </form>
                </table>
        </div>
    </center>
</body>

</html>