<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
<style>
    table {
            border-collapse: collapse;
            
        }
        table, th, td {
            border: 1px solid black;
            
            
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
}
</style>
</head>
<body>
<center>
<form action="" method="POST" name="input">
<table>
<tr>
    <td>Nim</td>
    <td><input type="text" name="nim"></td>
</tr>
<br>
<tr>
    <td>Program Studi</td>
    <td><select name="program_studi">
    <option value="Teknik Informatika S1">A11</option>
    <option value="Sistem Informasi S1">A12</option>
    <option value="Teknik Informatika D3">A22</option>
    </td>
    </select>
</tr>
<br>
<tr>
    <td>Nilai Tugas</td>
    <td><input type="number" min="0" max="100" name="nilai_tugas"></td>
</tr>
<br>
<tr>
    <td>Nilai UTS</td>
    <td><input type="number" min="0" max="100" name="nilai_uts"></td>
</tr>
<br>
<tr>
    <td>Nilai UAS</td>
    <td><input type="number" min="0" max="100" name="nilai_uas"></td>
</tr>
<br>
<tr >
    <td>Catatan Khusus</td>
    <td><input type="checkbox" name="catatan_khusus01" value="Kehadiran >=70%" >Kehadiran >=70%</td>
</tr>
<br>
<tr>
    <td><td><input type="checkbox" name="catatan_khusus02" value="Interaktif dikelas">Interaktif dikelas</td></td>
</tr>
<br>
<tr>
    <td><td><input type="checkbox" name="catatan_khusus03" value="Tidak terlambat mengumpulkan tugas">Tidak terlambat mengumpulkan tugas</td></td>
</tr>
<br>
<tr>
    <td><td><input type="submit" style="color:white;font-family:sans;background-color:#4CAF50;border: 2px solid black;border-radius:5px;" name="simpan" value="SIMPAN">
</td></td> 
</tr>

<br>
<table>
<tr>
    <th>Program Studi</td>
    <th>NIM</td>
    <th>Nilai Akhir</td>
    <th>STATUS</td>
    <th>Catatan Khusus</td>
</tr>
<br>
<tr>
    <td><?php
    if (isset($_POST['simpan'])){
        $ps = $_POST['program_studi'];
        echo "$ps";
    }
   
    ?>
    </td>
    <td><?php
    if (isset($_POST['simpan'])){
        $nim = $_POST['nim'];
        echo "$nim";
    }
    ?>
    </td>
    <td style="text-align:center"><?php
    if (isset($_POST['simpan'])){
        $akhir = $_POST['nilai_tugas']*0.40+$_POST['nilai_uts']*0.30+$_POST['nilai_uas']*0.30;
        if ($akhir <=100 && $akhir >=85) {
            $akhir="Lulus";
            echo "A";
        }
        if ($akhir <=84 && $akhir >=70) {
            $akhir="Lulus";
            echo "B";
        }
        if ($akhir <=69 && $akhir >=60) {
            $akhir="Lulus";
            echo "C";
        }
        if ($akhir <=59 && $akhir >=50) {
            $akhir="Tidak Lulus";
            echo "D";
        }
        if ($akhir <=50  && $akhir >=0){
            $akhir="Tidak Lulus";
            echo "E";
        }
     
    }
    ?>
    </td>
    <td style="text-align:center"><?php
    if (isset($_POST['simpan'])) {
        echo $akhir;
    }
    ?>
    </td>
    <td><?php
    if (isset($_POST['simpan'])) {
        if (isset($_POST['catatan_khusus01'])) {
        echo $_POST['catatan_khusus01'] . "<br>";
        }
        if (isset($_POST['catatan_khusus02'])) {
        echo $_POST['catatan_khusus02'] . "<br>";
        }
        if (isset($_POST['catatan_khusus03'])) {
        echo $_POST['catatan_khusus03'] . "<br>";
        }
        if (isset($_POST['catatan_khusus04'])) {
            echo $_POST['catatan_khusus04'] . "<br>";
        }
    }
    ?>
  
    </td>
</tr>
</form>
</table>
</center>
</body>
</html>

