<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Logistik Masuk</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama Logistik</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Supplier</th> 
            <th>Tanggal Masuk</th> 
            <th>Tanggal Kadaluarsa</th> 
            <th>Dokumentasi</th> 
        </tr>
        @if($inlogistics->count() > 0)
        @foreach($inlogistics as $inlogistic)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ optional($inlogistic->logistic)->nama_logistik }}</td>
            <td>{{ $inlogistic->jumlah_logistik_masuk }}</td>
            <td>{{ optional($inlogistic->logistic)->satuan_logistik }}</td>
            <td>{{ optional($inlogistic->supplier)->nama_supplier }}</td>
            <td>{{ $inlogistic->tanggal_masuk }}</td>
            <td>{{ $inlogistic->expayer_logistik }}</td>
            <td>{{ asset($inlogistic->dokumentasi_masuk) }}</td>
        </tr>
        @endforeach
        @else
            <tr>
                <td colspan="8">Tidak ada data logistik masuk</td>
            </tr>
        @endif
    </table>

</body>

</html>