<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #logistics-table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #logistics-table td,
        #logistics-table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #logistics-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #logistics-table tr:hover {
            background-color: #ddd;
        }

        #logistics-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Detail Data Supplier</h1>
    <div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Kode Supplier:</label>
            <p>{{ $supplier->kode_supplier }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Nama Supplier:</label>
            <p>{{ $supplier->nama_supplier }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Email:</label>
            <p>{{ $supplier->email_supplier }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Telepon:</label>
            <p>{{ $supplier->telepon_supplier }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Instansi:</label>
            <p>{{ $supplier->instansi_supplier }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Ditambahkan Pada:</label>
            <p>{{ \Carbon\Carbon::parse($supplier->created_at)->translatedFormat('l, d F Y') }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Diperbarui Pada:</label>
            <p>{{ \Carbon\Carbon::parse($supplier->updated_at)->translatedFormat('l, d F Y') }}</p>
        </div>
    </div>
    <table id="logistics-table">
        <thead>
            <tr>
                <th style="text-align: center;">Kode Supplier</th>
                <th style="text-align: center;">Nama Supplier</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Telepon</th>
                <th style="text-align: center;">Instansi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $supplier->kode_supplier }}</td>
                <td class="text-center">{{ $supplier->nama_supplier }}</td>
                <td class="text-center">{{ $supplier->email_supplier }}</td>
                <td class="text-center">{{ $supplier->telepon_supplier }}</td>
                <td class="text-center">{{ $supplier->instansi_supplier }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>