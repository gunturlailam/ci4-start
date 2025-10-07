<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Kamar</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 40px;
    }

    table {
        border-collapse: collapse;
        width: 90%;
        background: white;
    }

    th,
    td {
        padding: 8px 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    th {
        background: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }
    </style>
</head>

<body>
    <center>
        <h2>Tampil Data Kamar</h2>
        <hr>
        <table border="1">
            <tr>
                <th>Kode Kamar</th>
                <th>Nama Kamar</th>
                <th>Harga</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Lama (hari)</th>
                <th>Total</th>
            </tr>

            <?php if (!empty($kamar)) : ?>
            <?php foreach ($kamar as $row) : ?>
            <tr>
                <td><?= esc($row['kodekamar'] ?? '') ?></td>
                <td><?= esc($row['namakamar'] ?? '') ?></td>
                <td><?= esc($row['harga'] ?? '') ?></td>
                <td><?= esc($row['tglcekin'] ?? '') ?></td>
                <td><?= esc($row['tglcekout'] ?? '') ?></td>
                <td><?= esc($row['lama'] ?? '') ?></td>
                <td><?= esc($row['total'] ?? '') ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="7">Belum ada data.</td>
            </tr>
            <?php endif; ?>
        </table>
    </center>
</body>

</html>