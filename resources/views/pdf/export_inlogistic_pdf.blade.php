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
            text-align: center;
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
            text-align: center;
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
                    <td>{{ \Carbon\Carbon::parse($inlogistic->tanggal_masuk)->translatedFormat('l, d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($inlogistic->expayer_logistik)->translatedFormat('l, d F Y') }}</td>
                    <td>
                        @if($inlogistic->dokumentasi_masuk)
                            <img src="{{ public_path('uploads/inlogistic/' . basename($inlogistic->dokumentasi_masuk)) }}"
                                width="90" height="90">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">Tidak ada data tersedia</td>
            </tr>
        @endif




    </table>

</body>

</html>