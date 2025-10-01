<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Item</title>
</head>

<body>
    <center>
        <form method="post" name="inputbrg" action="<?php base_url('Produk/simpan') ?>">
            <table>
                <tr>
                    <td>Kode Barang</td>
                    <td>
                        <select name="kodebrg" onchange="Tampil()">
                            <option>-PILIH-</option>
                            <option value="J001">J001</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>