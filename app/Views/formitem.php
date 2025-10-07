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
                            <option value="B001">B001</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama barang</td>
                    <td>
                        <input type="text" name="namabrg">
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Beli</td>
                    <td>
                        <input type="text" name="qty" onkeyup="Hitung()">
                    </td>
                </tr>
                <tr>
                    <td>Harga Barang</td>
                    <td>
                        <input type="text" name="hrg" onkeyup="Hitung()">
                    </td>
                </tr>
                <tr>
                    <td>Total Beli</td>
                    <td>
                        <input type="text" name="total">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <button type="submit">Simpan data</button>
                        <a href="<?= site_url('Produk/tampilproduk') ?>">Cetak Laporan</a>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
<script>
    function Tampil() {
        var kodebarang = document.inputbrg.kodebrg.value;
        if (kodebarang == "J001") {
            document.inputbrg.namabrg.value = "Jam"
        } else {
            document.inputbrg.namabrg.value = "Baju"
        }
    }

    function Hitung() {
        var harga = document.inputbrg.hrg.value;
        var jumlah = document.inputbrg.qty.value;
        var total_hrg = jumlah * harga;

        document.inputbrg.total.value = total_hrg
    }
</script>

</html>