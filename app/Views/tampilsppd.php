<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil SPPD</title>
</head>

<body>
    <center>
        <h2>Tampil Data SPPD</h2>
        <hr>
        <table border="1">
            <tr>
                <td>Kode Keberangkatan</td>
                <td>Agenda</td>
                <td>Biaya Transportasi</td>
                <td>Biaya Penginapan</td>
                <td>Biaya Pokok</td>
                <td>Total</td>
            </tr>

            <?php
            foreach ($sppdok as $data)
            ?>

            <tr>
                <td><?= $data['kode'] ?></td>
                <td><?= $data['agenda'] ?></td>
                <td><?= $data['btransportasi'] ?></td>
                <td><?= $data['bpenginapan'] ?></td>
                <td><?= $data['bpokok'] ?></td>
                <td><?= $data['total'] ?></td>
            </tr>
        </table>
    </center>
</body>

</html>