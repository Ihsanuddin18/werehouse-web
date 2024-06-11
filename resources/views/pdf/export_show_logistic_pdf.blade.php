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
    <h1>Detail Data Logistik</h1>
    <div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Kode Logistik:</label>
            <p>{{ $logistic->kode_logistik }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Nama Logistik:</label>
            <p>{{ $logistic->nama_logistik }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Satuan:</label>
            <p>{{ $logistic->satuan_logistik }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Ditambahkan Pada:</label>
            <p>{{ \Carbon\Carbon::parse($logistic->created_at)->translatedFormat('l, d F Y') }}</p>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Diperbarui Pada:</label>
            <p>{{ \Carbon\Carbon::parse($logistic->updated_at)->translatedFormat('l, d F Y') }}</p>
        </div>
    </div>
    <table id="logistics-table">
        <thead>
            <tr>
                <th style="text-align: center;">Kode Logistik</th>
                <th style="text-align: center;">Nama Logistik</th>
                <th style="text-align: center;">Satuan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $logistic->kode_logistik }}</td>
                <td class="text-center">{{ $logistic->nama_logistik }}</td>
                <td class="text-center">{{ $logistic->satuan_logistik }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>