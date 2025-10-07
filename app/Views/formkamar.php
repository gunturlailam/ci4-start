<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(180deg, #f7f9fc 0%, #eef2f7 100%);
        margin: 0;
        padding: 40px;
        color: #1f2937;
    }

    center {
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    table {
        border-collapse: separate;
        border-spacing: 0;
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        min-width: 420px;
    }

    td {
        padding: 10px 8px;
        vertical-align: middle;
    }

    td:first-child {
        color: #374151;
        font-weight: 600;
        white-space: nowrap;
        padding-right: 16px;
    }

    input,
    select {
        padding: 10px 12px;
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
        box-sizing: border-box;
        background: #fff;
    }

    input:focus,
    select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    input[readonly] {
        background: #f9fafb;
        color: #6b7280;
    }

    input[type="submit"],
    input[type="button"] {
        background: #2563eb;
        color: #ffffff;
        border: none;
        cursor: pointer;
        padding: 10px 14px;
        border-radius: 8px;
        font-weight: 600;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
        background: #1e4fd9;
    }

    input[type="submit"]:active,
    input[type="button"]:active {
        transform: translateY(1px);
    }
</style>

<body>
    <center>
        <form action="/simpankamar" name="form" method="post">
            <?= function_exists('csrf_field') ? csrf_field() : '' ?>
            <table>
                <tr>
                    <td>Kode Kamar</td>
                    <td>
                        <select name="kodekamar" onchange="kode()" required>
                            <option value="" disabled selected>- PILIH -</option>
                            <option value="k001">K001</option>
                            <option value="k002">K002</option>
                            <option value="k003">K003</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama Kamar</td>
                    <td><input type="text" name="namakamar" readonly></td>
                </tr>
                <tr>
                    <td>Harga Kamar</td>
                    <td><input type="text" name="harga" oninput="hitung()"></td>
                </tr>
                <tr>
                    <td>Tanggal Check In</td>
                    <td><input type="date" name="tglcekin" oninput="hitung()" required></td>
                </tr>
                <tr>
                    <td>Tanggal Check Out</td>
                    <td><input type="date" name="tglcekout" oninput="hitung()" required></td>
                </tr>
                <tr>
                    <td>Lama</td>
                    <td><input type="text" name="lama" readonly></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input type="text" name="total" readonly></td>
                </tr>
                <tr>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                    <td><input type="button" name="tampil" value="Tampilkan"
                            onclick="window.location.href='/tampilkamar'"></td>
                </tr>
            </table>
        </form>
    </center>

    <script>
        function kode() {
            var kode = document.form.kodekamar.value;
            var nama = "";

            if (kode === "k001") {
                document.form.namakamar.value = "Mawar"
                document.form.harga.value = "150000"
            } else if (kode === "k002") {
                document.form.namakamar.value = "Anggrek"
                document.form.harga.value = "200000"
            } else if (kode === "k003") {
                document.form.namakamar.value = "Melati"
                document.form.harga.value = "250000"
            } else {
                document.form.harga.value = "0"
            }

            hitung();
        }

        function hitung() {
            var harga = parseInt(document.form.harga.value) || 0;
            var tglIn = document.form.tglcekin.value;
            var tglOut = document.form.tglcekout.value;

            if (!tglIn || !tglOut) {
                document.form.lama.value = '';
                document.form.total.value = '';
                return;
            }

            var msPerDay = 24 * 60 * 60 * 1000;
            var start = new Date(tglIn + 'T00:00:00');
            var end = new Date(tglOut + 'T00:00:00');
            var diffDays = Math.round((end - start) / msPerDay);
            if (diffDays < 0) diffDays = 0;

            document.form.lama.value = diffDays;
            document.form.total.value = diffDays * harga;
        }
    </script>

</html>