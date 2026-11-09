
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid gray;
            padding: 4px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    <table>
        <tr>
            <th>NO.</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>ALAMAT</th>
            <th>NO.TELP</th>
        </tr>

        <?php $no = 1; ?>

        <?php foreach ($datamhs as $mhs) : ?>
            <tr>
                <td><?= $no++; ?>.</td>

                <td>
                    <?= htmlspecialchars($mhs['nim']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($mhs['nama']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($mhs['alamat']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($mhs['telp']); ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
