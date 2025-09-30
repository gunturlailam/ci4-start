<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f7fb;
            margin: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .items {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .item h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .qty-control {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .qty-control button {
            background: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            margin: 0 5px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.2s;
        }

        .qty-control button:hover {
            background: #0056b3;
        }

        .qty {
            font-size: 16px;
            min-width: 25px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        .btn-report {
            margin-top: 20px;
            display: block;
            width: 100%;
            background: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-report:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pilih Barang</h2>

        <!-- Pilihan Barang -->
        <div class="items">
            <div class="item" data-kode="J001" data-nama="Jam" data-harga="50000">
                <h3>Jam</h3>
                <p>Rp 50.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="B001" data-nama="Baju" data-harga="75000">
                <h3>Baju</h3>
                <p>Rp 75.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>
        </div>

        <!-- Tabel Pembelian -->
        <table id="tabelBelanja">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Cetak Laporan -->
        <button class="btn-report" onclick="cetakLaporan()">Cetak Laporan</button>
    </div>

    <script>
        function tambah(btn) {
            let qtySpan = btn.parentElement.querySelector(".qty");
            qtySpan.innerText = parseInt(qtySpan.innerText) + 1;
            updateTable();
        }

        function kurang(btn) {
            let qtySpan = btn.parentElement.querySelector(".qty");
            let current = parseInt(qtySpan.innerText);
            if (current > 0) {
                qtySpan.innerText = current - 1;
                updateTable();
            }
        }

        function updateTable() {
            let tbody = document.querySelector("#tabelBelanja tbody");
            tbody.innerHTML = "";

            document.querySelectorAll(".item").forEach(item => {
                let qty = parseInt(item.querySelector(".qty").innerText);
                if (qty > 0) {
                    let kode = item.dataset.kode;
                    let nama = item.dataset.nama;
                    let harga = parseInt(item.dataset.harga);
                    let total = harga * qty;

                    tbody.innerHTML += `
            <tr>
              <td>${kode}</td>
              <td>${nama}</td>
              <td>Rp ${harga.toLocaleString()}</td>
              <td>${qty}</td>
              <td>Rp ${total.toLocaleString()}</td>
            </tr>
          `;
                }
            });
        }

        function cetakLaporan() {
            let printContent = document.getElementById("tabelBelanja").outerHTML;
            let newWindow = window.open("", "_blank");
            newWindow.document.write("<h2>Laporan Belanja</h2>");
            newWindow.document.write(printContent);
            newWindow.document.close();
            newWindow.print();
        }
    </script>
</body>

</html>