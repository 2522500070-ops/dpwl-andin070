<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Mahasiswa</title>

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 40px;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: #d9f2f2;
            text-align: center;
            padding: 8px;
            font-weight: bold;
        }

        td {
            padding: 6px;
        }

        .no {
            text-align: center;
            width: 50px;
        }

        .nim {
            text-align: center;
            width: 120px;
        }

        .telp {
            text-align: center;
            width: 150px;
        }
    </style>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>

    <table>
        <tr>
            <th class="no">NO.</th>
            <th class="nim">NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>ALAMAT</th>
            <th class="telp">NO. TELP</th>
        </tr>

        <?php
        $i = 1;

        foreach ($datamhs as $mhs) {
        ?>
            <tr>
                <td class="no"><?= $i++; ?>.</td>
                <td class="nim"><?= $mhs['nim']; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['alamat']; ?></td>
                <td class="telp"><?= $mhs['telp']; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
    Admin, <?= htmlspecialchars($nama_user) ?>

</body>
</html>