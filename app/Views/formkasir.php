<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .items {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        .item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.08);
        }

        .item h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .item p {
            margin: 5px 0;
            color: #555;
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
            padding: 5px 12px;
            margin: 0 5px;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        .qty-control button:hover {
            background: #0056b3;
        }

        .qty {
            font-size: 16px;
            min-width: 25px;
            text-align: center;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
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
            transition: 0.3s;
        }

        .btn-report:hover {
            background: #1e7e34;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Kasir Makanan</h2>

        <!-- Pilihan Barang -->
        <div class="items">
            <div class="item" data-kode="01" data-nama="Bakso" data-harga="15000">
                <h3>Bakso</h3>
                <p>Rp 15.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="02" data-nama="Siomay" data-harga="15000">
                <h3>Siomay</h3>
                <p>Rp 15.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="03" data-nama="Mie Ayam" data-harga="15000">
                <h3>Mie Ayam</h3>
                <p>Rp 15.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="04" data-nama="Bakso Urat" data-harga="20000">
                <h3>Bakso Urat</h3>
                <p>Rp 20.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="05" data-nama="Teh Es" data-harga="5000">
                <h3>Teh Es</h3>
                <p>Rp 5.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="06" data-nama="Juice Mangga" data-harga="10000">
                <h3>Juice Mangga</h3>
                <p>Rp 10.000</p>
                <div class="qty-control">
                    <button onclick="kurang(this)">-</button>
                    <span class="qty">0</span>
                    <button onclick="tambah(this)">+</button>
                </div>
            </div>

            <div class="item" data-kode="07" data-nama="Juice Melon" data-harga="8000">
                <h3>Juice Melon</h3>
                <p>Rp 8.000</p>
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
            let grandTotal = 0;

            document.querySelectorAll(".item").forEach(item => {
                let qty = parseInt(item.querySelector(".qty").innerText);
                if (qty > 0) {
                    let kode = item.dataset.kode;
                    let nama = item.dataset.nama;
                    let harga = parseInt(item.dataset.harga);
                    let total = harga * qty;
                    grandTotal += total;

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

            if (grandTotal > 0) {
                tbody.innerHTML += `
          <tr style="font-weight:bold; background:#f1f1f1">
            <td colspan="4">Grand Total</td>
            <td>Rp ${grandTotal.toLocaleString()}</td>
          </tr>
        `;
            }
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