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

            <?php if (!empty($sppdok)) : ?>
                <?php foreach ($sppdok as $data) : ?>
                    <tr>
                        <td><?= esc($data['kode']) ?></td>
                        <td><?= esc($data['agenda']) ?></td>
                        <td><?= esc($data['btransportasi']) ?></td>
                        <td><?= esc($data['bpenginapan']) ?></td>
                        <td><?= esc($data['bpokok']) ?></td>
                        <td><?= esc($data['total']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Belum ada data.</td>
                </tr>
            <?php endif; ?>
        </table>
    </center>
</body>

</html>